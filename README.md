# CiviCRM Custom Theme Extension

A flexible theming extension for CiviCRM that provides subtheme capabilities, allowing you to create custom themes that inherit from parent themes while overriding specific styles.

## Overview

This extension enables you to create custom themes for CiviCRM with proper inheritance and style management. It supports:

- **Theme Inheritance**: Build subthemes that extend parent themes
- **CSS Variable Management**: Override CSS variables for consistent styling
- **Easy Customization**: Override only what you need, inherit the rest

## Features

- Subtheme architecture with parent theme inheritance
- CSS variables for easy customization

## Requirements

- CiviCRM 5.x or higher
- Parent theme extension (if creating a subtheme)
- PHP 7.4 or higher

## Installation

### Via Web UI
1. Download the extension from GitHub
2. Navigate to **Administer > System Settings > Extensions**
3. Click **Add New**
4. Upload the extension zip file
5. Click **Install**

### Via Command Line
```bash
cd /path/to/civicrm/ext
git clone https://github.com/Skvare/com.skvare.customtheme.git
cv en customtheme
```

### Via Composer (for managed installations)
```bash
composer require skvare/com.skvare.customtheme
cv en customtheme
```

### CSS Structure

The extension organizes CSS files in a modular structure:

```
css/
├── streams/
│   └── custom/
│       └── variables.css
└── other custom styles
```

### Importing Parent Theme Styles

**Important**: The `[civicrm.root]` token does NOT work in CSS `@import` statements. Use one of these approaches instead:

#### Option 1: Relative Paths (Recommended for CSS imports)
```css
/* In your custom/variables.css */
@import url('../../../parent-theme/streams/walbrook/css/_variables.css');

/* Your custom overrides */
:root {
  --primary-color: #your-color;
}
```

#### Option 2: Load Parent CSS via PHP (Best Practice)
In your `customtheme.php` file:

```php
function customtheme_civicrm_coreResourceList(&$list, $region) {
  $resources = CRM_Core_Resources::singleton();
  // Load parent theme CSS first
  $resources->addStyleFile('riverlea', 'streams/walbrook/css/_variables.css', -10, $region);
  $resources->addStyleFile('riverlea', 'streams/walbrook/css/civicrm.css', -10, $region);

  // Then load your subtheme CSS
  $resources->addStyleFile('com.skvare.customtheme', '/css/civicrm_custom.css', 0, $region);
}
```

## Usage
Navigate to Administer > Customize Data and Screens > Display Preferences (/civicrm/admin/setting/preferences/display)
    to select your custom theme.

### Basic Customization

1. **Modify CSS Variables**: Edit `css/streams/custom/variables.css` to customize colors, fonts, spacing, etc.

```css
:root {
  --primary-color: #0066cc;
  --secondary-color: #6c757d;
  --font-family: 'Arial', sans-serif;
  --border-radius: 4px;
}
```

2. **Add Custom Styles**: Create new CSS files in the `css/` directory and load them via hooks.

3. **Override Specific Components**: Target specific CiviCRM components with your custom styles.

### Best Practices

1. **Use CSS Variables**: Define reusable values in variables for consistency
2. **Maintain Specificity**: Avoid overly specific selectors
3. **Document Changes**: Comment your CSS overrides

Check browser developer tools to verify CSS load order and identify specificity conflicts.

## Support

- **Issues**: Report bugs and feature requests on [GitHub Issues](https://github.com/Skvare/com.skvare.customtheme/issues)
- **Documentation**: [CiviCRM Theming Documentation](https://docs.civicrm.org/dev/en/latest/framework/styling/)
- **Community**: [CiviCRM Stack Exchange](https://civicrm.stackexchange.com/)

## Credits

Developed and maintained by [Skvare](https://github.com/Skvare).

**Supporting Organizations**
[Skvare](https://skvare.com/contact)

---

**[Contact us](https://skvare.com/contact) for support or to learn more** about implementing automated group management in your CiviCRM environment.
