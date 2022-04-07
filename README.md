# fontrail

![Badge](./public/storage/php.svg) ![Badge](./public/storage/my-sql.svg)  ![Badge](./public/storage/mvc-architecture.svg)
![Badge](./public/storage/html-5.svg) ![Badge](./public/storage/css-3.svg)

## Table of contents 

- [fontrail](#fontrail)
  - [Table of contents](#table-of-contents)
  - [General informations](#general-informations)
    - [Objectives](#objectives)
    - [Authors](#authors)
  - [Organisation](#organisation)
  - [Setup](#setup)

## General informations

### Objectives 

* Making an easy tool to create font, with a social aspect
* Being able to be paid only for commercial use of the font created.
* Offer a font comparator with fontrail's fonts and other distributor as googlefont, dafont, etc.. took from an API (and optimize the querie) 

### Authors

* [Thibaut Fourneaux](https://github.com/FourneauxThibaut)
* [Anthony Lambert](https://github.com/Kaleidosport)

## Organisation

<details>
  <summary>MVC structure</summary>

```

    .
    ├── Controller/                     # Controller folder
    │   ├── Controller.php              # Parent class
    │   └── Validation.php              # Form validator
    │
    └── README.md                       # --[*Your are here*]--
    .
 
```
</details> 

## Setup

  **Import your Database before the following operations**

To run this project, install the dependencies using Composer Install :

```
$ cd fontrail
$ Composer install
$ php -S localhost:8080
```

<p align="right">[<a href="#top">back to top</a>]</p>                                    
