/**
 * CompRo CMS Admin JavaScript
 * This file contains custom JavaScript for the CompRo CMS admin panel
 */

document.addEventListener("DOMContentLoaded", function () {
    // Apply dynamic colors from settings
    applyDynamicColors();

    // Initialize tooltips
    initTooltips();

    // Initialize form validation
    initFormValidation();

    // Initialize CKEditor for textareas with ckeditor class
    initCKEditor();
});

/**
 * Apply dynamic colors from settings
 */
function applyDynamicColors() {
    // Get primary and secondary colors from data attributes
    const primaryColor =
        document.documentElement.getAttribute("data-primary-color") ||
        "#4361ee";
    const secondaryColor =
        document.documentElement.getAttribute("data-secondary-color") ||
        "#7239ea";

    // Set CSS variables
    document.documentElement.style.setProperty("--primary-color", primaryColor);
    document.documentElement.style.setProperty(
        "--secondary-color",
        secondaryColor
    );

    // Convert hex to RGB for rgba values
    const primaryRgb = hexToRgb(primaryColor);
    const secondaryRgb = hexToRgb(secondaryColor);

    if (primaryRgb) {
        document.documentElement.style.setProperty(
            "--bs-primary-rgb",
            `${primaryRgb.r}, ${primaryRgb.g}, ${primaryRgb.b}`
        );
    }

    if (secondaryRgb) {
        document.documentElement.style.setProperty(
            "--bs-secondary-rgb",
            `${secondaryRgb.r}, ${secondaryRgb.g}, ${secondaryRgb.b}`
        );
    }

    // Apply colors to admin panel specific elements
    document.documentElement.style.setProperty(
        "--pc-sidebar-active-color",
        primaryColor
    );
    document.documentElement.style.setProperty(
        "--pc-sidebar-active-text",
        "#ffffff"
    );
    document.documentElement.style.setProperty(
        "--pc-sidebar-menu-active-color",
        primaryColor
    );
    document.documentElement.style.setProperty(
        "--pc-sidebar-menu-active-text",
        "#ffffff"
    );
    document.documentElement.style.setProperty(
        "--pc-sidebar-menu-active-icon",
        "#ffffff"
    );
    document.documentElement.style.setProperty(
        "--pc-card-border-color",
        primaryColor
    );
    document.documentElement.style.setProperty(
        "--pc-heading-color",
        primaryColor
    );
    document.documentElement.style.setProperty("--pc-link-color", primaryColor);
    document.documentElement.style.setProperty(
        "--pc-link-hover-color",
        secondaryColor
    );
}

/**
 * Initialize tooltips
 */
function initTooltips() {
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

/**
 * Initialize form validation
 */
function initFormValidation() {
    // Add was-validated class to forms with novalidate attribute
    const forms = document.querySelectorAll("form.needs-validation");

    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
}

/**
 * Initialize CKEditor for textareas with ckeditor class
 * Note: This is handled in the ckeditor.blade.php partial
 */
function initCKEditor() {
    // This is now handled in the ckeditor.blade.php partial
}

/**
 * Convert hex color to RGB
 *
 * @param {string} hex - Hex color code
 * @returns {object|null} - RGB object or null if invalid
 */
function hexToRgb(hex) {
    // Remove # if present
    hex = hex.replace(/^#/, "");

    // Parse hex values
    let bigint = parseInt(hex, 16);

    // Check if valid hex
    if (isNaN(bigint)) {
        return null;
    }

    // Extract RGB values
    const r = (bigint >> 16) & 255;
    const g = (bigint >> 8) & 255;
    const b = bigint & 255;

    return { r, g, b };
}
