document.addEventListener("DOMContentLoaded", function () {
    // Handle both contact page form and home page form
    const contactForm = document.getElementById("contact-form-custom");
    const homeContactForm = document.getElementById("home-contact-form");

    if (contactForm) {
        initializeFormValidation(contactForm);
    }

    if (homeContactForm) {
        initializeFormValidation(homeContactForm);
    }

    function initializeFormValidation(form) {
        const fields = {
            name: form.querySelector('input[name="name"]'),
            email: form.querySelector('input[name="email"]'),
            phone: form.querySelector('input[name="phone"]'),
            subject: form.querySelector('input[name="subject"]'),
            message: form.querySelector('textarea[name="message"]'),
            captcha: form.querySelector('input[name="captcha"]'),
        };

        // Real-time validation
        Object.keys(fields).forEach((fieldName) => {
            const field = fields[fieldName];
            if (field) {
                field.addEventListener("blur", () =>
                    validateField(field, isFieldValid(field, fieldName))
                );
                field.addEventListener("input", () => {
                    if (field.classList.contains("is-invalid")) {
                        validateField(field, isFieldValid(field, fieldName));
                    }
                });
            }
        });

        // Form submission
        form.addEventListener("submit", function (e) {
            let isValid = true;
            const submitBtn = form.querySelector('button[type="submit"]');

            // Reset button state if it was previously in loading state
            if (submitBtn && submitBtn.classList.contains("loading")) {
                resetButtonState(submitBtn);
            }

            Object.keys(fields).forEach((fieldName) => {
                const field = fields[fieldName];
                if (field) {
                    const fieldValid = isFieldValid(field, fieldName);
                    validateField(field, fieldValid);
                    if (!fieldValid) isValid = false;
                }
            });

            if (!isValid) {
                e.preventDefault();
                // Scroll to first invalid field
                const firstInvalidField = form.querySelector(".is-invalid");
                if (firstInvalidField) {
                    firstInvalidField.scrollIntoView({
                        behavior: "smooth",
                        block: "center",
                    });
                    firstInvalidField.focus();
                }
                return;
            }

            // Show loading state only if validation passes
            if (submitBtn) {
                setButtonLoadingState(submitBtn);

                // The form will submit naturally and redirect
                // No need for timeout or manual handling
                // The loading state will persist until page redirects
            }
        });
    }

    function isFieldValid(field, fieldName) {
        const value = field.value.trim();

        switch (fieldName) {
            case "name":
            case "subject":
            case "message":
                return value.length > 0;
            case "email":
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
            case "phone":
                // Phone is optional, so it's valid if empty or if it contains valid phone characters
                return value === "" || /^[\d\s\-\+\(\)]+$/.test(value);
            case "captcha":
                return /^\d+$/.test(value) && value.length > 0;
            default:
                return true;
        }
    }

    function validateField(field, isValid) {
        const inputBox = field.closest(".input-box");

        if (isValid) {
            field.classList.remove("is-invalid");
            field.classList.add("is-valid");
            if (inputBox) {
                inputBox.classList.remove("has-error");
                inputBox.classList.add("has-success");
            }
        } else {
            field.classList.remove("is-valid");
            field.classList.add("is-invalid");
            if (inputBox) {
                inputBox.classList.remove("has-success");
                inputBox.classList.add("has-error");
            }
        }
    }

    // Helper functions for button state management
    function setButtonLoadingState(button) {
        button.disabled = true;
        button.classList.add("loading");
        button.setAttribute("data-original-text", button.innerHTML);
        button.innerHTML = "Sending...";
    }

    function resetButtonState(button) {
        button.disabled = false;
        button.classList.remove("loading");
        const originalText = button.getAttribute("data-original-text");
        if (originalText) {
            button.innerHTML = originalText;
            button.removeAttribute("data-original-text");
        } else {
            // Fallback text based on button ID
            if (button.id === "homeSubmitBtn") {
                button.innerHTML = "Send Message";
            } else {
                button.innerHTML = "Submit Message";
            }
        }
    }

    function showErrorMessage(form, message) {
        // Remove existing error messages
        const existingErrors = form.querySelectorAll(".alert-danger.js-error");
        existingErrors.forEach((error) => error.remove());

        // Create new error message
        const errorDiv = document.createElement("div");
        errorDiv.className =
            "alert alert-danger alert-dismissible fade show js-error";
        errorDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;

        // Insert error message at the top of the form
        form.insertBefore(errorDiv, form.firstChild);

        // Auto-dismiss after 5 seconds
        setTimeout(() => {
            if (errorDiv && errorDiv.parentNode) {
                errorDiv.style.transition = "opacity 0.5s";
                errorDiv.style.opacity = "0";
                setTimeout(() => {
                    if (errorDiv.parentNode) {
                        errorDiv.parentNode.removeChild(errorDiv);
                    }
                }, 500);
            }
        }, 5000);
    }

    // Auto-dismiss alerts after 5 seconds
    const alerts = document.querySelectorAll(".alert");
    alerts.forEach((alert) => {
        setTimeout(() => {
            if (alert && alert.parentNode) {
                alert.style.transition = "opacity 0.5s";
                alert.style.opacity = "0";
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.parentNode.removeChild(alert);
                    }
                }, 500);
            }
        }, 5000);
    });

    // Reset button states on page load (in case of browser back button)
    const submitButtons = document.querySelectorAll('button[type="submit"]');
    submitButtons.forEach((button) => {
        if (button.classList.contains("loading")) {
            resetButtonState(button);
        }
    });

    // Check if there are validation errors on page load and reset button state
    const hasValidationErrors = document.querySelector(".alert-danger");
    const hasSuccessMessage = document.querySelector(".alert-success");

    if (hasValidationErrors || hasSuccessMessage) {
        // If there are errors or success messages, ensure buttons are not in loading state
        submitButtons.forEach((button) => {
            if (button.classList.contains("loading")) {
                resetButtonState(button);
            }
        });
    }
});
