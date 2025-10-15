# Company Profile Website Enhancement Prompt

## Overview

Please implement the following comprehensive enhancements to the company profile website based on the Laravel boilerplate project. These improvements include contact form integration, CAPTCHA implementation, error handling, and critical bug fixes.

## 1. Contact Form Integration with Admin Module

### Backend Integration

-   **Connect contact form to admin backend**: Ensure form submissions are stored in `contact_messages` table and accessible through admin panel
-   **Database Schema**: Add phone field to contact_messages table if not present
-   **Admin Views**: Update admin contact message views to display phone field
-   **Email Notifications**: Implement email notifications to admin when new contact messages are submitted

### Required Files to Modify:

-   `app/Http/Controllers/Landing/ContactController.php`
-   `app/Models/ContactMessage.php`
-   `database/migrations/*_create_contact_messages_table.php`
-   `resources/views/admin/contact-messages/index.blade.php`
-   `resources/views/admin/contact-messages/show.blade.php`
-   `resources/views/emails/contact/message-received.blade.php`

## 2. Form Submission Flow with Validation

### Client-Side Validation

-   **Real-time validation**: Implement JavaScript validation with visual feedback
-   **Form fields**: Name (required), Email (required), Phone (optional), Subject (required), Message (required)
-   **Visual feedback**: Use Bootstrap validation classes (is-valid, is-invalid)
-   **File**: Create `public/js/contact-form.js`

### Server-Side Validation

-   **Laravel validation rules**: Implement comprehensive server-side validation
-   **CSRF protection**: Ensure all forms include CSRF tokens
-   **Error handling**: Proper error messages and input preservation on validation failure

### CSS Styling

-   **Validation styles**: Add custom CSS for form validation feedback
-   **File**: Update `public/css/landing-custom.css`

## 3. CAPTCHA Implementation (Session-Based Math CAPTCHA)

### CAPTCHA Generation

-   **Simple math questions**: Generate random addition problems (1-10 + 1-10)
-   **Session storage**: Store CAPTCHA values in session (captcha_num1, captcha_num2, captcha_answer)
-   **Self-hosted**: No external services required

### Implementation Details:

```php
// In ContactController and HomeController
private function generateCaptcha()
{
    $num1 = rand(1, 10);
    $num2 = rand(1, 10);

    session([
        'captcha_num1' => $num1,
        'captcha_num2' => $num2,
        'captcha_answer' => $num1 + $num2
    ]);
}

private function validateCaptcha($userAnswer)
{
    $correctAnswer = session('captcha_answer');
    return $correctAnswer && (int)$userAnswer === (int)$correctAnswer;
}
```

### CAPTCHA Display (IMPORTANT):

-   **Use placeholder instead of label**: The CAPTCHA question should be in the input placeholder, NOT in a label tag
-   **Consistent with form design**: Match the existing form field pattern

```html
<!-- CORRECT - Use placeholder -->
<input
    type="number"
    name="captcha"
    id="captcha"
    class="input-field"
    placeholder="Security Question: What is {{ session('captcha_num1', rand(1, 10)) }} + {{ session('captcha_num2', rand(1, 10)) }}?"
    required
/>

<!-- WRONG - Don't use label -->
<label for="captcha">Security Question: ...</label>
<input
    type="number"
    name="captcha"
    id="captcha"
    class="input-field"
    placeholder="Enter answer"
    required
/>
```

### Controllers to Update:

-   **ContactController**: Add CAPTCHA generation in `index()` method and validation in `store()` method
-   **HomeController**: Add CAPTCHA generation in `index()` method for home page contact form

## 4. User Experience Enhancements

### Success/Error Messages

-   **Flash messages**: Implement session-based success/error messages
-   **Bootstrap alerts**: Use Bootstrap alert components for message display
-   **Message types**: Success, validation errors, CAPTCHA failures

### Form Locations

-   **Contact page**: Dedicated contact page form (`/contact`)
-   **Home page**: Contact form section on landing page (`/`)
-   **Consistent functionality**: Both forms should have identical validation and CAPTCHA

## 5. Critical Bug Fixes

### Database Foreign Key Constraint Fix

**Problem**: Page visit tracking causing foreign key constraint violations
**File**: `app/Http/Middleware/TrackPageVisits.php`

```php
// Fix user_id foreign key constraint
$userId = null;
if (Auth::check()) {
    $authUserId = Auth::id();
    // Verify the user actually exists in the database
    if ($authUserId && \App\Models\User::find($authUserId)) {
        $userId = $authUserId;
    }
}

// Wrap in try-catch to prevent page load failures
try {
    PageVisit::create([
        'page_url' => $request->fullUrl(),
        'page_name' => $pageName,
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
        'country' => $location->countryName ?? null,
        'city' => $location->cityName ?? null,
        'referrer' => $request->header('referer'),
        'visited_at' => now(),
        'user_id' => $userId,
    ]);
} catch (\Exception $e) {
    logger('Page visit tracking failed: ' . $e->getMessage());
}
```

### SEO Function Error Fix

**Problem**: Controllers calling `load('seo')` on fallback page objects
**Files**: `app/Http/Controllers/Landing/AboutController.php`, `app/Http/Controllers/Landing/BlogController.php`

```php
// Fix load() method calls on fallback pages
if ($aboutPage instanceof \App\Models\Page && $aboutPage->seo) {
    $aboutPage->load('seo');
}
```

### Undefined Array Key Fixes

**Problem**: Views accessing array keys without checking existence
**Files**:

-   `resources/views/landing/partials/header.blade.php`
-   `resources/views/landing/partials/preloader.blade.php`
-   `resources/views/landing/partials/footer.blade.php`

```php
// Fix undefined array key access
@if(isset($data['website_logo']) && $data['website_logo'])
    <img src="{{ asset('storage/' . $data['website_logo']) }}" width="152" height="35" alt="Logo">
@else
    <img src="{{asset('vendor/landing')}}/assets/images/logo.svg" width="152" height="35" alt="Logo">
@endif

// For contact information in footer
@if(isset($data['contact_email']) && $data['contact_email'])
    <a href="mailto:{{ $data['contact_email'] }}">{{ $data['contact_email'] }}</a>
@endif
```

### Error Handling in Head Partial

**File**: `resources/views/landing/partials/head.blade.php`

```php
// Add error handling for page loading and SEO property access
try {
    if ($currentUrl === '/') {
        $activePage = \App\Helpers\PageHelper::getHomePage();
    }
    // ... other page loading logic
} catch (\Exception $e) {
    $activePage = null;
}

try {
    if ($activePage && isset($activePage->seo) && $activePage->seo) {
        $pageTitle = $activePage->seo->title ?: $pageTitle;
        $pageDescription = $activePage->seo->description ?: $metaDescription;
    }
} catch (\Exception $e) {
    // Use default values if SEO data loading fails
}
```

## 6. Testing Implementation

### Test File: `tests/Feature/ContactFormTest.php`

Create comprehensive tests covering:

-   Contact page loading successfully
-   Home page contact form presence
-   Form submission with valid data
-   CAPTCHA validation (both valid and invalid)
-   Required field validation
-   Optional phone field handling

### Required Website Settings

Ensure these settings exist in the database:

-   `contact_email`, `contact_phone`, `contact_address`
-   `website_logo`, `website_name`
-   `meta_description`, `meta_keywords`
-   Social media settings: `social_facebook`, `social_twitter`, `social_instagram`, `social_linkedin`, `social_youtube`

## 7. Implementation Checklist

### Phase 1: Contact Form Backend

-   [ ] Update ContactController with CAPTCHA methods
-   [ ] Add phone field to contact_messages table
-   [ ] Update ContactMessage model
-   [ ] Create/update admin views for contact messages
-   [ ] Implement email notifications

### Phase 2: Frontend Implementation

-   [ ] Update contact form views (contact.blade.php and index.blade.php)
-   [ ] Add CAPTCHA fields using placeholder (NOT label)
-   [ ] Create contact-form.js for client-side validation
-   [ ] Add validation CSS styles

### Phase 3: Controller Updates

-   [ ] Add CAPTCHA generation to HomeController::index()
-   [ ] Update ContactController with validation and CAPTCHA
-   [ ] Ensure both controllers generate CAPTCHA properly

### Phase 4: Bug Fixes

-   [ ] Fix TrackPageVisits middleware
-   [ ] Fix controller load() method calls
-   [ ] Fix undefined array key issues in views
-   [ ] Add error handling to head.blade.php

### Phase 5: Testing

-   [ ] Create comprehensive test suite
-   [ ] Add required website settings
-   [ ] Test all form functionality
-   [ ] Verify CAPTCHA is visible and working

## 8. Key Points to Remember

1. **CAPTCHA Display**: Always use placeholder, never label tags
2. **Session Management**: Generate CAPTCHA in both ContactController and HomeController
3. **Error Handling**: Wrap potentially failing code in try-catch blocks
4. **Array Access**: Always check if array keys exist before accessing
5. **Database Integrity**: Handle foreign key constraints properly
6. **Consistent Styling**: Match existing form field patterns
7. **Testing**: Implement comprehensive tests to catch regressions

## 9. Expected Outcomes

After implementation:

-   ✅ Contact forms work on both contact page and home page
-   ✅ CAPTCHA is visible and functional
-   ✅ All form validations work (client and server-side)
-   ✅ Admin can view and manage contact messages
-   ✅ Email notifications are sent to admin
-   ✅ No more database foreign key errors
-   ✅ No more undefined array key errors
-   ✅ All landing pages load without errors
-   ✅ Comprehensive test coverage

This enhancement will provide a robust, secure, and user-friendly contact form system while fixing critical stability issues in the company profile website.

## 10. Detailed Code Examples

### ContactController Implementation

```php
<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Helpers\PageHelper;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        // Generate CAPTCHA numbers for the session
        $this->generateCaptcha();

        // Get contact page from CMS
        $contactPage = PageHelper::getContactPage();

        // If contact page doesn't exist, create a fallback
        if (!$contactPage) {
            $contactPage = PageHelper::createFallbackPage(
                'Contact Us',
                'Get in touch with us for any inquiries.',
                'contact, get in touch, inquiries'
            );
        }

        return view('landing.contact', compact('contactPage'));
    }

    public function store(Request $request)
    {
        // Validate CAPTCHA first
        if (!$this->validateCaptcha($request->captcha)) {
            return redirect()->back()
                ->with('error', 'CAPTCHA verification failed. Please try again.')
                ->withInput();
        }

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'captcha' => 'required|numeric',
        ]);

        try {
            // Create the contact message
            $contactMessage = ContactMessage::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
            ]);

            // Send email notification to admin
            try {
                Mail::send('emails.contact.message-received', compact('contactMessage'), function ($message) use ($contactMessage) {
                    $message->to(config('mail.admin_email', 'admin@example.com'))
                        ->subject('New Contact Message: ' . $contactMessage->subject);
                });
            } catch (\Exception $e) {
                \Log::error('Failed to send contact email: ' . $e->getMessage());
            }

            // Generate new CAPTCHA for next submission
            $this->generateCaptcha();

            return redirect()->route('home.contact')
                ->with('success', 'Your message has been sent successfully. We will get back to you soon!');
        } catch (\Exception $e) {
            \Log::error('Failed to save contact message: ' . $e->getMessage());

            // Generate new CAPTCHA for retry
            $this->generateCaptcha();

            return redirect()->route('home.contact')
                ->with('error', 'An error occurred while sending your message. Please try again later.')
                ->withInput();
        }
    }

    private function generateCaptcha()
    {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        session([
            'captcha_num1' => $num1,
            'captcha_num2' => $num2,
            'captcha_answer' => $num1 + $num2
        ]);
    }

    private function validateCaptcha($userAnswer)
    {
        $correctAnswer = session('captcha_answer');
        return $correctAnswer && (int)$userAnswer === (int)$correctAnswer;
    }
}
```

### Contact Form View (contact.blade.php)

```html
<!-- Contact Form Section -->
<form
    action="{{ route('home.contact.store') }}"
    method="POST"
    id="contactForm"
    novalidate
>
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-field">
                <input
                    type="text"
                    name="name"
                    class="input-field"
                    placeholder="Full Name"
                    value="{{ old('name') }}"
                    required
                />
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-field">
                <input
                    type="email"
                    name="email"
                    class="input-field"
                    placeholder="Email Address"
                    value="{{ old('email') }}"
                    required
                />
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-field">
                <input
                    type="tel"
                    name="phone"
                    class="input-field"
                    placeholder="Phone No."
                    value="{{ old('phone') }}"
                />
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-field">
                <input
                    type="text"
                    name="subject"
                    class="input-field"
                    placeholder="Subject"
                    value="{{ old('subject') }}"
                    required
                />
                <div class="invalid-feedback"></div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-field">
                <textarea
                    name="message"
                    class="input-field"
                    placeholder="Message"
                    rows="5"
                    required
                >
{{ old('message') }}</textarea
                >
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <!-- Simple Math CAPTCHA -->
        <div class="col-lg-12">
            <div class="form-field">
                <input
                    type="number"
                    name="captcha"
                    id="captcha"
                    class="input-field"
                    placeholder="Security Question: What is {{ session('captcha_num1', rand(1, 10)) }} + {{ session('captcha_num2', rand(1, 10)) }}?"
                    required
                />
                <div class="invalid-feedback"></div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-field form-submit-btn">
                <button type="submit" class="sec-btn" id="submitBtn">
                    Submit now
                </button>
            </div>
        </div>
    </div>
</form>
```

### Client-Side Validation JavaScript (contact-form.js)

```javascript
document.addEventListener("DOMContentLoaded", function () {
    const contactForm = document.getElementById("contactForm");
    if (!contactForm) return;

    const fields = {
        name: contactForm.querySelector('input[name="name"]'),
        email: contactForm.querySelector('input[name="email"]'),
        subject: contactForm.querySelector('input[name="subject"]'),
        message: contactForm.querySelector('textarea[name="message"]'),
        captcha: contactForm.querySelector('input[name="captcha"]'),
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
    contactForm.addEventListener("submit", function (e) {
        let isValid = true;

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
        }
    });

    function isFieldValid(field, fieldName) {
        const value = field.value.trim();

        switch (fieldName) {
            case "name":
            case "subject":
            case "message":
                return value.length > 0;
            case "email":
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
            case "captcha":
                return /^\d+$/.test(value) && value.length > 0;
            default:
                return true;
        }
    }

    function validateField(field, isValid, message = "") {
        if (isValid) {
            field.classList.remove("is-invalid");
            field.classList.add("is-valid");
        } else {
            field.classList.remove("is-valid");
            field.classList.add("is-invalid");
        }
    }
});
```

### CSS Validation Styles (landing-custom.css)

```css
/* Form Validation Styles */
.input-field.is-valid {
    border-color: #28a745;
    padding-right: calc(1.5em + 0.75rem);
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='m2.3 6.73.8-.77-.8-.77-.8.77.8.77zm1.48-4.97L6.06 4.3 5.28 5.07l-1.48-2.54-.8.77L5.28 6.84l.78-.77 2.54-4.24-.8-.77z'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.input-field.is-invalid {
    border-color: #dc3545;
    padding-right: calc(1.5em + 0.75rem);
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='m5.8 4.6 2.4 2.4m0-2.4L5.8 7'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.invalid-feedback {
    display: none;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
}

.input-field.is-invalid ~ .invalid-feedback {
    display: block;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--text-color, #333);
}
```

### Migration for Phone Field

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToContactMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->after('email');
        });
    }

    public function down()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn('phone');
        });
    }
}
```

### Test Setup Example

```php
protected function setUp(): void
{
    parent::setUp();

    // Create required website settings
    $settings = [
        ['key' => 'contact_email', 'value' => 'test@example.com', 'group' => 'contact'],
        ['key' => 'contact_phone', 'value' => '+1234567890', 'group' => 'contact'],
        ['key' => 'contact_address', 'value' => '123 Test Street', 'group' => 'contact'],
        ['key' => 'website_logo', 'value' => 'test-logo.png', 'group' => 'general'],
        ['key' => 'website_name', 'value' => 'Test Company', 'group' => 'general'],
        ['key' => 'meta_description', 'value' => 'Test description', 'group' => 'seo'],
        ['key' => 'meta_keywords', 'value' => 'test, keywords', 'group' => 'seo'],
    ];

    foreach ($settings as $setting) {
        WebsiteSetting::updateOrCreate(
            ['key' => $setting['key']],
            [
                'value' => $setting['value'],
                'group' => $setting['group'],
                'type' => 'text',
                'display_name' => ucwords(str_replace('_', ' ', $setting['key'])),
                'is_public' => true,
                'order' => 1
            ]
        );
    }
}
```

## 11. Routes Configuration

Ensure these routes exist in `routes/landing.php`:

```php
// Contact routes
Route::get('/contact', [ContactController::class, 'index'])->name('home.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('home.contact.store');
```

## 12. Email Template

Create `resources/views/emails/contact/message-received.blade.php`:

```html
<!DOCTYPE html>
<html>
    <head>
        <title>New Contact Message</title>
    </head>
    <body>
        <h2>New Contact Message Received</h2>

        <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
        <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
        @if($contactMessage->phone)
        <p><strong>Phone:</strong> {{ $contactMessage->phone }}</p>
        @endif
        <p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>

        <h3>Message:</h3>
        <p>{{ $contactMessage->message }}</p>

        <hr />
        <p>
            <small
                >Sent at: {{ $contactMessage->created_at->format('Y-m-d H:i:s')
                }}</small
            >
        </p>
    </body>
</html>
```

This comprehensive prompt provides all the necessary code examples, implementation details, and step-by-step instructions to successfully implement the same enhancements on other company profile websites using the same boilerplate.
