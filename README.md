<p align="center">
    <img src="https://img.shields.io/badge/version-1.0.0-blue" />
</p>

# Docker-PHP

A simple docker container for PHP & MySQL
<img src="https://img.shields.io/badge/PHP-7.4-green" />

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes

### Prerequisites

What things you need

* [Git](https://git-scm.com/downloads)
* [Docker](https://www.docker.com/get-started/)

### Installation

Position yourself in your project folder
```
cd your-project
```

Clone
```
git clone https://github.com/nicolas-herbez/docker-php-mysql.git .
```

## How to use

### Start

Execute from root
```
docker-compose up -d --build
```

### Test

Put your source code in the *public_html* folder and test it at this address
<a href="http://localhost/" target="_blanc"><img src="https://img.shields.io/badge/localhost-80-blue" /></a>

### Stop

Execute from root
```
docker-compose down
```

## Versioning

We use [Semantic Versioning](http://semver.org/) for versioning

## Authors

[Nicolas Herbez](https://github.com/nicolas-herbez)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
