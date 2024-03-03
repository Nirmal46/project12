// netlify/functions/submitForm.js

const mysql = require('mysql');

exports.handler = async function (event, context) {
  // Parse the incoming JSON data from the request body
  const data = JSON.parse(event.body);

  // Database connection parameters
  const connection = mysql.createConnection({
    host: 'your-mysql-host',  // Replace with your MySQL host
    user: 'your-database-user',
    password: 'your-database-password',
    database: 'your-database-name',
  });

  // Establish the database connection
  connection.connect();

  // Your SQL query
  const sql = `INSERT INTO your_table (column1, column2, column3) VALUES (?, ?, ?)`;

  // Execute the query with the data from the request
  connection.query(sql, [data.value1, data.value2, data.value3], function (error, results, fields) {
    if (error) {
      console.error(error);
      connection.end();
      return {
        statusCode: 500,
        body: JSON.stringify({ error: 'Database error' }),
      };
    }

    // Close the database connection
    connection.end();

    return {
      statusCode: 200,
      body: JSON.stringify({ message: 'Data inserted successfully' }),
    };
  });
};
