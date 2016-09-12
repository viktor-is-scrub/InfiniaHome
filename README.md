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

[Setup instructions](docs/setup.md)


## Connecting InfiniaApps 

1. Navigate to yourinfinia.org/admin.php?menu=get-api-key
2. Generate a new key
3. Copy down the key and paste it into yourinfiniaapp.org/admin.php?menu=link-to-infinia

## Using the InfiniaPress API
We provide many languages for you to code your own Infinia App and integrate it. To get started, check out one of our
`infinia-api-[lang]` repositories, or stick with `infinia-api-json`.

### Test credentials

Test database credentials have been provided in the file `test_mysql_credentials.json`.
We have provided these credentials because we have secured our mysql servers
and limited the hosts. **Do not use these credentials in production**.
You may change the credentials for your own testing system.
Please note that these credentials should NOT be changed on the git repository.

#### Questions regarding [the official website](https://infinia.press)?
Click [here](http://derpz.tk/support) to get support.




