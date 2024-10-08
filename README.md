# Online Course Platform

This platform helps users enhance their skills according to their interests, such as digital marketing, programming, data science, product design, and more. A professional mentor guides each class to ensure students can adapt to the needs of the industry and are ready to work after completing their studies.
![homePage](homePage.png)

## Key Features

- **User Roles**: The platform supports three user roles: **Owner**, **Teacher**, and **Student**.
  - **Owner**:
      - Manages essential data such as class categories,
      - classes,
      - student transactions,
      - and teachers in each class.
  - **Teacher**:
      - Has a CMS to manage class creation,
      - add materials to each class,
      - and oversee the learning process.
  - **Student**:
      - Can browse the class catalog,
      - view class details,
      - study each class,
      - select subscription packages,
      - proceed to checkout,
      - and confirm payments.

## Getting Started

To start with the platform, choose your role and follow the corresponding guidelines to maximize your learning and teaching experience.

1. **Owners**:
    - Set up class categories,
    - manage transactions,
    - and assign teachers to different classes.
3. **Teachers**:
    - Use the CMS to create engaging courses,
    - upload materials,
    - and interact with students.
5. **Students**:
    - Explore various classes,
    - subscribe to your preferred course packages,
    - and start learning.

## Web Flow Overview
![UserFLow](User-Flow.png)

## Database Schema
![ERD](entity.png)

## Landing Page Overview
![landing page](landingPageOverview.png)

## Student Class Detail Overview
![Detail Class](detailClass.png)

## How to clone in your device

1. **Clone the repository**:
    ```sh
    git clone https://github.com/rachmaadr/EventTicketingPlatform.git
    ```
2. **Navigate to the project directory**:
    ```sh
    cd EventTicketingPlatform
    ```
3. **Install dependencies**:
    ```sh
    composer install
    npm install
    ```
4. **Set up environment variables**:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```
5. **Run the development server**:
    ```sh
    php artisan serve
    npm run dev
    ```

## Contributing

I welcome contributions! Please read our contributing guidelines before you submit any changes or suggestions.



