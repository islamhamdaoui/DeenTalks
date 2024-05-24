<div align="center">
    <a href="https://deentalks.wuaze.com/" target="_blank">
        <img src="https://img.shields.io/badge/Demo-Link-brightgreen" alt="Demo Link">
    </a>
</div>

   ![20240524_222621](https://github.com/islamhamdaoui/DeenTalks/assets/91889739/279fde7b-38b3-439f-954e-6e56165176e9)
   
<h1>DeenTalks</h1>
    <p>DeenTalks is a community-driven platform dedicated to discussing the teachings of Islam, correcting misconceptions, and fostering meaningful conversations about the religion. Our goal is to create a respectful and educational environment where users can learn, share, and grow in their understanding of Islam.</p>
    
## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [Contributing](#contributing)
- [Contact](#contact)

## Features

- **Discussion Forums**: Engage in conversations about various topics related to Islam.
- **Question & Answer**: Post questions and receive answers from knowledgeable community members.
- **Error Correction**: Identify and correct common misconceptions about Islam.
- **User Profiles**: Create profiles to track your contributions and follow other users.

## Installation

### Prerequisites

Ensure you have the following installed:

- [Git](https://git-scm.com/)
- [PHP](https://www.php.net/) (version 7.4 or higher)
- [MySQL](https://www.mysql.com/)
- [Apache](https://httpd.apache.org/) or [Nginx](https://www.nginx.com/)

### Steps

1. **Clone the Repository**

    ```sh
    git clone https://github.com/islamhamdaoui/DeenTalks.git
    cd DeenTalks
    ```

2. **Set Up the Web Server**

    - Place the repository files in your web server's root directory (e.g., `htdocs` for XAMPP or `www` for WAMP).
    - Ensure your server is configured to serve PHP files.

## Database Setup

1. **Create the Database**

    - Open phpMyAdmin or use the MySQL command line.
    - Create a new database named `deentalks`.

2. **Import the Database Schema**

    - In phpMyAdmin, select the `deentalks` database.
    - Click on the `Import` tab and upload the `deentalks Database.sql` file located in the root of this repository.

3. **Configure Database Connection**

    - Open the `config.php` file in the project root directory.
    - Update the database connection settings with your MySQL credentials.

    ```php
    <?php
    $db_host = 'localhost';
    $db_name = 'deentalks';
    $db_user = 'root';
    $db_pass = '';

    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>

## Usage

1. **Access the Application**

    Open your web browser and navigate to `http://localhost/DeenTalks` (or the appropriate URL configured for your server).

2. **Register an Account**: Sign up to create an account.
3. **Join Discussions**: Participate in existing discussions or start your own.
4. **Correct Misconceptions**: Contribute by correcting common misconceptions about Islam.

## Contributing

We welcome contributions from the community! To contribute:

1. **Fork the Repository**
2. **Create a Branch**

    ```sh
    git checkout -b feature/your-feature-name
    ```

3. **Commit Your Changes**

    ```sh
    git commit -m "Add your feature"
    ```

4. **Push to Your Branch**

    ```sh
    git push origin feature/your-feature-name
    ```

5. **Create a Pull Request**: Submit your changes for review.

## Contact

For any inquiries or issues, please contact us at:

- Email: [islamhamdaoui2000@gmail.com](mailto:islamhamdaoui2000@gmail.com)

