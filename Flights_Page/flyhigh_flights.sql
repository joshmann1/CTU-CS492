DROP TABLE IF EXISTS flightinventory;

CREATE TABLE flightinventory (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  destination TEXT,
  depart_date DATE,
  return_date DATE,
  price DECIMAL(10,2),
  available_seats INTEGER
);

INSERT INTO flightinventory (destination, depart_date, return_date, price, available_seats) VALUES
('New York', '2025-06-15', '2025-06-22', 199.00, 20),
('Chicago', '2025-06-16', '2025-06-23', 179.00, 20),
('Los Angeles', '2025-06-17', '2025-06-24', 299.00, 22),
('Houston', '2025-06-18', '2025-06-25', 189.00, 16),
('Miami', '2025-06-19', '2025-06-26', 209.00, 15),
('Atlanta', '2025-06-20', '2025-06-27', 169.00, 12),
('Dallas', '2025-06-21', '2025-06-28', 195.00, 14),
('San Francisco', '2025-06-22', '2025-06-29', 275.00, 17),
('Seattle', '2025-06-23', '2025-06-30', 265.00, 10),
('Denver', '2025-06-24', '2025-07-01', 230.00, 13);

