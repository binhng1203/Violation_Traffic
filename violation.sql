CREATE DATABASE IF NOT EXISTS traffic_violation_db;
USE traffic_violation_db;

CREATE TABLE admin (
  username varchar(250) NOT NULL,
  password varchar(250) NOT NULL,
  DateTimeAdded date NOT NULL
);

CREATE TABLE IF NOT EXISTS vehicles (
    vehicle_id INT AUTO_INCREMENT PRIMARY KEY,
    license_plate VARCHAR(20) ,
    owner_name VARCHAR(100) NOT NULL,
    registration_date DATE NOT NULL,
    vehicle_type VARCHAR(50),
    color VARCHAR(50),
    UNIQUE (license_plate)
);

CREATE TABLE IF NOT EXISTS driving_licenses (
    license_id INT AUTO_INCREMENT PRIMARY KEY,
    license_number VARCHAR(20) NOT NULL,
    driver_name VARCHAR(100) NOT NULL,
    date_of_issue DATE NOT NULL,
    date_of_expiry DATE NOT NULL,
    issuing_authority VARCHAR(100),
    UNIQUE (license_number)
);

CREATE TABLE IF NOT EXISTS traffic_reports (
    report_id INT AUTO_INCREMENT PRIMARY KEY,
    license_plate VARCHAR(20) NOT NULL,
    license_number VARCHAR(20) NOT NULL,
    report_date DATE NOT NULL,
    violation_type VARCHAR(100) NOT NULL,
    location VARCHAR(255) NOT NULL,
    fine INT NOT NULL,
    notes TEXT,
    is_payment_done BOOLEAN DEFAULT FALSE
);

INSERT INTO admin (username, password, DateTimeAdded) VALUES
('admin12', '$2y$10$VZzIZJGI8jzyoO5A.xIeuOD2jdKPFzuzueckn.cnvuwMdyCzr27QW', '0000-00-00'),
('nam', '$2y$10$REsb4pxNFSwBm1o/F4a62uvzP06vztWPK68YVdZpBpAJVSAFuW1lW', '0000-00-00'),
('hnam', '$2y$10$1oW/.aW.JjKdX96.lCEPQOq0HMQHMecqu/SFlJZ6Pd1AhU5mmOlza', '0000-00-00'),
('passwordispassword', '$2y$10$FW5mu8icZXsOdbc8FfPCE.c87BfVNz2d5naCB8wX.QP7Nx16kn3s.', '0000-00-00');

INSERT INTO vehicles (license_plate, owner_name, registration_date, vehicle_type, color) VALUES
('29A-12345', 'Nguyễn Văn A', '2020-01-01', 'Xe máy', 'Đen'),
('30B-54321', 'Trần Thị B', '2020-01-02', 'Ô tô', 'Trắng'),
('30C-67890', 'Phạm Văn C', '2020-01-03', 'Xe máy', 'Đỏ'),
('29E-56789', 'Vũ Văn D', '2020-01-04', 'Ô tô', 'Xanh'),
('30H-23456', 'Hoàng Việt Dũng', '2020-05-30', 'Ô tô', 'Đen'),
('30H-34567', 'Nguyễn Thị Linh', '2020-11-05', 'Ô tô', 'Trắng'),
('29H-45678', 'Trần Hoàng', '2020-12-06', 'Xe máy', 'Trắng'),
('29H-54321', 'Lê Văn', '2021-01-25', 'Xe máy', 'Đen');

INSERT INTO driving_licenses (license_number, driver_name, date_of_issue, date_of_expiry, issuing_authority) VALUES
('123456', 'Nguyễn Văn A', '2020-01-01', '2025-01-01', 'Sở GTVT Hà Nội'),
('543210', 'Trần Thị B', '2020-01-02', '2025-01-02', 'Sở GTVT Hà Nội'),
('678901', 'Phạm Văn C', '2020-01-03', '2025-01-03', 'Sở GTVT Hà Nội'),
('234567', 'Vũ Văn D', '2020-01-04', '2025-01-04', 'Sở GTVT Hà Nội'),
('567890', 'Hoàng Việt Dũng', '2020-05-30', '2025-05-30', 'Sở GTVT Hà Nội'),
('987654', 'Trần Hoàng', '2020-12-06', '2025-12-06', 'Sở GTVT Hà Nội'),
('876543', 'Lê Văn', '2021-01-25', '2025-01-25', 'Sở GTVT Hà Nội');

INSERT INTO traffic_reports (license_plate, license_number, report_date, violation_type, location, fine) VALUES
('29A-12345', '123456', '2021-01-01', 'Không đội mũ bảo hiểm', 'Hà Nội', 100000),
('30B-54321', '543210', '2022-01-02', 'Vượt đèn đỏ', 'Hà Nội', 200000),
('30C-67890', '678901', '2021-01-03', 'Không đội mũ bảo hiểm', 'Hà Nội', 100000),
('29E-56789', '234567', '2023-01-03', 'Vượt đèn đỏ', 'Hà Nội', 200000),
('30H-23456', '567890', '2022-01-03', 'Đi sai làn đường', 'Hà Nội', 500000),
('30H-34567', '321098', '2021-01-03', 'Vượt đèn đỏ', 'Hà Nội', 200000),
('29H-45678', '987654', '2023-01-03', 'Số người quá quy định', 'Hà Nội', 300000),
('29H-54321', '876543', '2022-01-03', 'Không đội mũ bảo hiểm', 'Hà Nội', 100000);