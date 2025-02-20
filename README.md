# FreshMart Integrated Enterprise System

## A simple implementation of Service Oriented Architecture (SOA) using nodejs

FreshMart is a fictitious grocery store for which this project provides an Integrated Enterprise System. The system includes the following key services:
* ### Point of Sale (POS)
  Handles transactions and customer purchases.
  Provides charts and graphs to track streaks, completion rates, and overall progress over time.
* ### Authentication Service
  Manages user authentication and authorization.
* ### Inventory Management
  Tracks and updates stock levels in real-time.

## Tech Stack
* ### Backend: NodeJS
* ### Database: MongoDB (or any preferred database)
* ### Authentication: JWT-based authentication

## How to install the App locally?
### Prerequisites
- Node.js
- npm or yarn

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/gabify/Freshmart-Groceries.git
   ```
2. Navigate to the project directory:
   ```bash
   cd your-repo
   ```
3. Install dependencies:
   ```bash
   npm install
   ```
   
4. Run the application:
   ```bash
   npm run dev
   ```
## API Endpoints
### ESB
| Service         | Endpoint              | Description                  |
|----------------|----------------------|------------------------------|
| Regiter User | `/api/v1/auth/signup`  | Route to Authentication service      |
| Login user | `/api/v1/auth/login`  | Route to Authentication service      |
| Add Product | `/api/v1/inventory/new`  | Route to Inventory service        |
| Get Products | `/api/v1/inventory/all`  | Route to Inventory service        |
| Add Product | `/api/v1/pos/new`  | Route to POS service       |
------------------------------------------------------------------------

### Inventory Service
| Service         | Endpoint              | Description                  |
|----------------|----------------------|------------------------------|
| Add product | `/add`  | Insert new product        |
| Get all products | `/`  | Returns all products        |
| Reduce stock of a product | `/edit:productId`  | Reduce stock in a product        |
------------------------------------------------------------------------

### POS Service
| Service         | Endpoint              | Description                  |
|----------------|----------------------|------------------------------|
| Add Transaction | `/add`  | Insert transactions to database         |
------------------------------------------------------------------------

### Authentication Service
| Service         | Endpoint              | Description                  |
|----------------|----------------------|------------------------------|
| Regiter User | `/new`  | Register new user       |
| Login | `/login`  | Log in new user       |
| Check token | `/auth-check/:authorization`  | Check authentication token of user        |
------------------------------------------------------------------------

## Found a bug?
If you found an issue or would like to submit an improvement to this project, please submit an issue using the issue tab above.
If you like to submit a PR with a fix, reference the issue you created.

## Like this project?
If you like this project, you can give it a star. 
