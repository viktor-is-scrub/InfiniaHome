# InfiniaHome
This repository hosts the source code of InfianiaPress' home page.

InfiniaPress is an open-source attempt to create a productivity suite in the web.

## Setup
1. Edit `inc/config.php` to your desired values
2. Upload to server
3. Browse to yourinfinia.com/setup/
4. Follow the instructions
5. Viola!


## Requirements

To install InfiniaHome on your server, you need

- PHP Version 5.5+
- Apache mod_rewrite
- SMTP support for your system
- .htaccess support
- `mysqli` or `pdo_mysql` extension for php (we will not support mysql, so don't report that in the bugtracker)


## Connecting InfiniaApps 

1. Navigate to yourinfinia.org/admin.php?menu=get-api-key
2. Generate a new key
3. Copy down the key and paste it into yourinfiniaapp.org/admin.php?menu=link-to-infinia

## Using the InfiniaPress API
We provide many languages for you to code your own Infinia App and integrate it. To get started, check out one of our
`infinia-api-[lang]` repositories, or stick with `infinia-api-json`.

### References
Thanks to
[CodePlanet](https://codeplanet.io/how-to-make-a-single-page-website/)
[StartBootstrap](https://github.com/BlackrockDigital/startbootstrap-scrolling-nav)
(one page parallax animations)




