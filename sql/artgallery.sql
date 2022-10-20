SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `artgallery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `artgallery`;

CREATE TABLE `unsold_work` (
  `Title` varchar(20) NOT NULL,
  `Artist` varchar(20) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Medium` varchar(20) NOT NULL,
  `Style` varchar(20) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `Asking_price` varchar(20) NOT NULL,
  `Date_Of_Show` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `unsold_work` (`Title`, `Artist`, `Type`, `Medium`, `Style`, `Size`, `Asking_price`, `Date_of_Show`) VALUES
('F5', 'Brock Lesnar', 'painting', 'marble', 'contemporary impressionist', '200x300 inches', '$1000000', '2021-12-13'),
('RKO', 'Randy Orton', 'painting', 'mixed', 'contemporary impressionist', '200x300 inches', '$2000000', '2021-11-24'),
('Attitude Adjustment', 'John Cena', 'painting', 'mixed', 'contemporary impressionist', '100x300 inches', '$3000000', '2021-12-15'),
('Six One Nine', 'Ray', 'painting', 'oil', 'contemporary impressionist', '200x150 inches', '$4000000', '2021-12-15'),
('Brogue Kick', 'Sheamus', 'painting', 'marble', 'contemporary impressionist', '200x300 inches', '$5000000', '2021-12-13'),
('You cant see me', 'John Cena', 'painting', 'marble', 'contemporary impressionist', '200x300 inches', '$2500000', '2020-12-13'),
('White Noise', 'Sheamus', 'painting', 'marble', 'contemporary impressionist', '200x300 inches', '$2300000', '2020-12-13'),
('SuplexCity', 'Brock Lesnar', 'painting', 'marble', 'contemporary impressionist', '200x300 inches', '$3000000', '2020-12-13'),
('STF', 'John Cena', 'painting', 'marble', 'contemporary impressionist', '200x300 inches', '$4700000', '2020-12-13');


CREATE TABLE `artist` (
  `Name` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `SocSecNo` varchar(20) NOT NULL,
  `UsualType` varchar(20) NOT NULL,
  `UsualMedium` varchar(20) NOT NULL,
  `UsualStyle` varchar(20) NOT NULL,
  `Sales_Last_Year` varchar(20) NOT NULL,
  `Sales_Year_To_Date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `artist` (`Name`, `Address`, `Phone`, `SocSecNo`, `UsualType`, `UsualMedium`, `UsualStyle`, `Sales_Last_Year`, `Sales_Year_To_Date`) VALUES
('Brock Lesnar', 'Red road', '0938474565', '999-99-9999', 'painting', 'marble', 'contemporary impressionist', '$14000000', '$12200000'),
('Randy Orton', 'Green road', '0947536363', '888-88-8888', 'painting', 'mixed', 'contemporary impressionist', '$16800000', '$15500000'),
('John Cena', 'Black road', '0945284775', '774-77-7777', 'painting', 'mixed', 'contemporary impressionist', '$23000000', '$12000000'),
('Ray', 'Pink road', '0924756284', '997-64-7775', 'painting', 'oil', 'contemporary impressionist', '$14000000', '$13000000'),
('Sheamus', 'Yellow Road', '0935244733', '987-44-5567', 'painting', 'marble', 'contemporary impressionist', '$35000000', '$20000000'),
('AJStyle', 'White Road', '0984566483', '346-98-6468', 'painting', 'oil', 'contemporary impressionist', '$23000000', '$17000000');


CREATE TABLE `collector` (
  `Name` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `SocSecNo` varchar(20) NOT NULL,
  `Sales_Last_Year` varchar(20) NOT NULL,
  `Sales_Year_To_Date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `collector` (`Name`, `Address`, `Phone`, `SocSecNo`, `Sales_Last_Year`, `Sales_Year_To_Date`) VALUES
('Ja Morant', 'Red road', '0997833365', '145-44-2525', '$14000000', '$12200000'),
('Randy Orton', 'Green road', '0909864533', '833-74-5456', '$16800000', '$15500000'),
('John Cena', 'Black road', '0902645445', '396-75-0575', '$23000000', '$12000000');

CREATE TABLE `sale` (
  `Title` varchar(20) NOT NULL,
  `Artist` varchar(20) NOT NULL,
  `Cust_Name` varchar(20) NOT NULL,
  `Cust_Add` varchar(20) NOT NULL,
  `Date_Sold` date NOT NULL,
  `Salesperson` varchar(20) NOT NULL,
  `Selling_Price` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `sale` (`Title`, `Artist`, `Cust_Name`, `Cust_Add`, `Date_Sold`, `Salesperson`, `Selling_Price`) VALUES
('You cant see me', 'John Cena', 'Stephen Curry', 'Red road', '2021-10-26', 'Kevin', '$1500000'),
('White Noise', 'Sheamus', 'Dramond Green', 'Black road', '2021-09-20', 'Tom', '$1900000'),
('SuplexCity', 'Brock Lesnar', 'Stephen Curry', 'Red road', '2021-05-18', 'Kevin', '$2300000'),
('STF', 'John Cena', 'Jordan Poole', 'Yellow road', '2022-05-18', 'Nick', '$3500000');


CREATE TABLE `customer` (
  `Cust_Name` varchar(20) NOT NULL,
  `Cust_Add` varchar(20) NOT NULL,
  `Cust_Phone` varchar(20) NOT NULL,
  `Amt_Bought_Last_Year` varchar(20) NOT NULL,
  `Amt_bought_Year_To_Date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`Cust_Name`, `Cust_Add`, `Cust_Phone`, `Amt_Bought_Last_Year`, `Amt_bought_Year_To_Date`) VALUES
('Stephen Curry', 'Red road', '0955688965', '$15400000', '$18600000'),
('Klay Thompson', 'Green road', '0909837457', '$13500000', '$15900000'),
('Dramond Green', 'Black road', '0912282384', '$26000000', '$12800000'),
('Andrew Wiggins', 'Pink road', '0923497453', '$18000000', '$19000000'),
('Jordan Poole', 'Yellow Road', '0900924646', '$38000000', '$26000000');

ALTER TABLE `unsold_work`
  ADD FOREIGN KEY (`Artist`) REFERENCES artist(`Name`);
  
ALTER TABLE `sale`
  ADD FOREIGN KEY (`Cust_Name`) REFERENCES customer(`Cust_Name`);

ALTER TABLE `artist`
  ADD PRIMARY KEY (`SocSecNo`);

ALTER TABLE `collector`
  ADD PRIMARY KEY (`SocSecNo`);

ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_Name`);