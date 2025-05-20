# OOP TASK
This project demonstrates OOP principles by simulating a fruit juicer in PHP.

## Requirements

- PHP 8.0 or higher
- Composer (https://getcomposer.org)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Filip95/oop-task.git
   cd oop-task
   ```
2. Install dependencies and generate the autoloader:
   ```bash
   composer install
   composer dump-autoload
   ```

## Usage

- To run the simulation:
  ```bash
  composer simulate
  ```
  or
  ```bash
  php bin/simulate.php
  ```

## Project Structure

- `src/` – PHP classes (Fruit, Apple, Interfaces, Exceptions, FruitContainer, Strainer, Juicer)
- `bin/simulate.php` – entry-point script for the juicer simulation
- `composer.json` – project metadata, autoloading, and scripts
- `README.md` – this file
- `.gitignore` – files and directories to ignore in Git

## Notes
- **Inheritance**: `Apple` extends `Fruit`.
- **Interface**: `ISqueezable` ensures all fruits can be squeezed.
- **Polymorphism**: `Juicer` and `Strainer` operate on the `ISqueezable` interface.
- **Exception Handling**: prevents squeezing a rotten apple and overfilling the container.

}
