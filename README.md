[contributors-shield]: https://img.shields.io/github/contributors/hassan7303/Lazy-load-for-enamad.svg?style=for-the-badge
[contributors-url]: https://github.com/hassan7303/Lazy-load-for-enamad/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/hassan7303/Lazy-load-for-enamad.svg?style=for-the-badge&label=Fork
[forks-url]: https://github.com/hassan7303/Lazy-load-for-enamad/network/members
[stars-shield]: https://img.shields.io/github/stars/hassan7303/Lazy-load-for-enamad.svg?style=for-the-badge
[stars-url]: https://github.com/hassan7303/Lazy-load-for-enamad/stargazers
[license-shield]: https://img.shields.io/github/license/hassan7303/Lazy-load-for-enamad.svg?style=for-the-badge
[license-url]: https://github.com/hassan7303/Lazy-load-for-enamad/blob/master/LICENCE.md
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-blue.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/hassan-ali-askari-280bb530a/
[telegram-shield]: https://img.shields.io/badge/-Telegram-blue.svg?style=for-the-badge&logo=telegram&colorB=555
[telegram-url]: https://t.me/hassan7303
[instagram-shield]: https://img.shields.io/badge/-Instagram-red.svg?style=for-the-badge&logo=instagram&colorB=555
[instagram-url]: https://www.instagram.com/hasan_ali_askari
[github-shield]: https://img.shields.io/badge/-GitHub-black.svg?style=for-the-badge&logo=github&colorB=555
[github-url]: https://github.com/hassan7303
[email-shield]: https://img.shields.io/badge/-Email-orange.svg?style=for-the-badge&logo=gmail&colorB=555
[email-url]: mailto:hassanali7303@gmail.com

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]
[![Telegram][telegram-shield]][telegram-url]
[![Instagram][instagram-shield]][instagram-url]
[![GitHub][github-shield]][github-url]
[![Email][email-shield]][email-url]

# LazyLoadForEnamad Plugin

## Overview

**Plugin Name**: LazyLoadForEnamad  
**Version**: 1.0.0  
**Author**: Hassan Ali Askari  
**Author URI**: [Telegram](https://t.me/hassan7303)  
**Plugin URI**: [GitHub](https://github.com/hassan7303)  
**License**: MIT  
**License URI**: [MIT License](https://opensource.org/licenses/MIT)  
**Email**: [hassanali7303@gmail.com](mailto:hassanali7303@gmail.com)  
**Domain Path:** [Domain](https://hsnali.ir)

## Description

The **LazyLoadForEnamad** plugin enables users to create a lazy-loaded shortcode for Enamad content. It allows content to be loaded asynchronously, improving page load times and user experience.

## Features

- Create and manage a shortcode from an admin settings page.
- Load shortcode content via AJAX for improved performance.
- Displays a loading placeholder until content is retrieved.

## Installation

1. Download the plugin files.
2. Upload the `LazyLoadForEnamad` folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the **Plugins** menu in WordPress.

## Usage

### Admin Settings

1. Navigate to the **Custom Shortcode** menu in the WordPress admin panel.
2. Enter your Enamad shortcode in the provided textarea.
3. Save the settings.

### Shortcode

To display the lazy-loaded content based on the user’s settings, use the following shortcode in your posts or pages:

```plaintext
[custom_html]
```

## Functions

### `custom_shortcode_menu()`
Adds a menu item to the WordPress admin panel.

**Return**  `void`

### `custom_shortcode_page()`
Displays the settings page content where users can input their shortcode.

**Return**  `void`

### `custom_shortcode_settings()`
Registers settings and adds sections and fields to the settings page.

**Return**  `void`

### `load_custom_shortcode()`
Handles the AJAX request for the custom shortcode and retrieves the saved content.

**Return**  `void`

### `custom_shortcode_enqueue_scripts()`
Enqueues the JavaScript necessary for lazy loading.

**Return**  `void`

### `custom_shortcode_function()`
Shortcode function that displays a placeholder for AJAX-loaded content.

**Return**  `string`
