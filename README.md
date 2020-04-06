# Webase

[![GitHub version](https://badge.fury.io/gh/lemondropsarl%2Fwebase.svg)](https://badge.fury.io/gh/lemondropsarl%2Fwebase)
[GitHub tag (latest SemVer)](https://img.shields.io/github/v/tag/lemondropsarl/webase)
[![Build Status](https://travis-ci.org/lemondropsarl/webase.svg?branch=master)](https://travis-ci.org/lemondropsarl/webase)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Coverage Status](https://coveralls.io/repos/github/lemondropsarl/webase/badge.svg?branch=master)](https://coveralls.io/github/lemondropsarl/webase?branch=master)


Webase is a php cocktail of base project built on top of **CodeIngiter** to help developers 
start building new project with no worries about the foundation or starting from scratch
with webase you get **HMVC**, **MOdular Migrations**, **Authentication** and many more features

## What is HMVC - Modular Extension?

Modular Extensions makes the CodeIgniter PHP framework modular. Modules are groups of independent components, typically model, controller and view, arranged in an application modules sub-directory that can be dropped into other CodeIgniter applications.

HMVC stands for Hierarchical Model View Controller.

Module Controllers can be used as normal Controllers or HMVC Controllers and they can be used as widgets to help you build view partials.

## Why bother with migration?

Migration is a best way to sync your database schema from live to local or other team your working with automatically and in a good and best practice.

## Getting started

it is very easy to get a copy of webase and start a new project right away

#### Prerequisites
1. PHP >= 5.8 (Recommended using version 7.3)
2. on Windows local machine use **MAMP** or **XAMP**

#### Installation and running

* Clone the project `git clone https://github.com/lemondropsarl/webase.git`
* Run composer `composer install`
* Open in Browser `exemple : http://localhost/webase/`

* Create your module in `application/modules/` folder
your controllers must `extends MX_Controller`

```
<?php
class Xyz extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
    }
}

```
* Start developping your new project

Controllers may be loaded from application/controllers sub-directories.

Controllers may also be loaded from module/controllers sub-directories.

#### Unit Testing

* check `application/tests/` folder and all tests files are created inside
* to create test for you controllers in `application/tests/controllers/` folder.  see example for `welcome_test.php` 
* Run Test : `vendor/bin/phpunit -c application/tests/

## Featured

* [Material Dashboard](https://demos.creative-tim.com/material-dashboard-dark/docs/2.0/getting-started/introduction.html)

Material Dashboard is a free Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design. We are very excited to introduce our take on the material concepts through an easy to use and beautiful set of components. Material Dashboard was built over the popular Bootstrap framework and it comes with a couple of third-party plugins redesigned to fit in with the rest of the elements.

This product came as a result of users asking for a material dashboard after we released our successful [Material Kit](https://www.creative-tim.com/product/material-kit). We developed it based on your feedback and it is a powerful bootstrap admin dashboard, which allows you to build products like admin panels, content managements systems and CRMs.

# How to contribute

* Fork the project
* Clone the project and start working on your feature
* Commit to your origin remote
* pull request on `develop branch` leave the `master branch` **ALONE**







