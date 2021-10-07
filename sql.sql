CREATE TABLE `user` (
  `username` varchar(100) NOT NULL PRIMARY KEY,
  `nric` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `admin` (
  `staffid` varchar(100) NOT NULL PRIMARY KEY,
  `staffname` varchar(100) NOT NULL,
  `staffnric` varchar(100) NOT NULL,
  `staffphonenum` varchar(100) NOT NULL,
  `staffdob` varchar(100) NOT NULL,
  `staffgender` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES
('STAFF001', 'KAMAL HUSIN BIN SHAMSUDDIN', 'XXXXXXXXXXXX', 'XXXXXXXXXXX', 'XX XX XXXX', 'MALE', 'STAFF001'),
('STAFF002', 'OSMAN KAMARUDIN BIN JUMAAT', 'XXXXXXXXXXXX', 'XXXXXXXXXXX', 'XX XX XXXX', 'MALE', 'STAFF002'),
('STAFF003', 'HAMZAH SAMSIAH BINTI MOKHZANI', 'XXXXXXXXXXXX', 'XXXXXXXXXXX', 'XX XX XXXX', 'FEMALE', 'STAFF003'),
('STAFF004', 'PRAVIN KUMAR A/L ARUMUGAM', 'XXXXXXXXXXXX', 'XXXXXXXXXXX', 'XX XX XXXX', 'MALE', 'STAFF004'),
('STAFF005', 'JASON LEE A/L BRUCE LEE', 'XXXXXXXXXXXX', 'XXXXXXXXXXX', 'XX XX XXXX', 'MALE', 'STAFF005');

CREATE TABLE `vehicle` (
  `vehicleno` varchar(100) NOT NULL PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  FOREIGN KEY (`username`) REFERENCES user (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `summons` (
  `summonsno` varchar(100) NOT NULL PRIMARY KEY,
  `summonsdate` varchar(100) NOT NULL,
  `summonstime` varchar(100) NOT NULL,
  `summonsstate` varchar(100) NOT NULL,
  `summonsdetails` varchar(100) NOT NULL,
  `summonsprice` varchar(100) NOT NULL,
  `summonsdesc` varchar(100),
  `summonsdepart` varchar(100) NOT NULL,
  `summonspaid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  FOREIGN KEY (`username`) REFERENCES user (`username`),
  `staffid` varchar(100) NOT NULL,
  FOREIGN KEY (`staffid`) REFERENCES admin (`staffid`),
  `offenceid` varchar(100) NOT NULL,
  FOREIGN KEY (`offenceid`) REFERENCES offence (`offenceid`),
  `vehicleno` varchar(100) NOT NULL,
  FOREIGN KEY (`vehicleno`) REFERENCES vehicle (`vehicleno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `offence` (
  `offenceid` varchar(100) NOT NULL PRIMARY KEY,
  `offencedetails` varchar(100) NOT NULL,
  `offenceprice` varchar(100) NOT NULL,
  `offencedepart` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO offence VALUES
('PDRM001', 'SPEED LIMIT', '150', 'PDRM'),
('PDRM002', 'SEATBELT', '70', 'PDRM'),
('PDRM003', 'HELMET', '70', 'PDRM'),
('PDRM004', 'U-TURN', '100', 'PDRM'),
('PDRM005', 'TRAFFIC LIGHT', '200', 'PDRM'),
('PDRM006', 'USING DEVICE', '100', 'PDRM'),
('PDRM007', 'DRIVING LICENSE', '80', 'PDRM'),
('PDRM008', 'ROAD TAX', '80', 'PDRM'),
('PDRM009', 'EMERGENCY LANE', '100', 'PDRM'),
('PDRM010', 'WARRANT', '300', 'PDRM'),
('JPJ001', 'OVERLOAD', '300', 'JPJ'),
('JPJ002', 'FALLING LOAD', '300', 'JPJ'),
('JPJ003', 'LONG LOAD', '300', 'JPJ'),
('JPJ004', 'WALL OPENED', '100', 'JPJ'),
('JPJ005', 'VEHICLE SIGNS', '70', 'JPJ'),
('JPJ006', 'LEAKING', '70', 'JPJ'),
('JPJ007', 'FIRE HYDRANT PARKING', '100', 'JPJ'),
('JPJ008', 'BUS PARKING', '100', 'JPJ'),
('JPJ009', 'JUNCTION PARKING', '150', 'JPJ'),
('JPJ010', 'EMERGENCY LANE PARKING', '300', 'JPJ'),
('JPJ011', 'EMERGENCY LANE DRIVE', '300', 'JPJ'),
('JPJ012', 'SIGN BOARDS', '300', 'JPJ'),
('JPJ013', 'OVERTAKE LEFT', '300', 'JPJ'),
('JPJ014', 'ESCAPED FROM JPJ', '300', 'JPJ'),
('JPJ015', 'SPEED LIMIT', '300', 'JPJ'),
('JPJ016', 'WRONG WAY', '150', 'JPJ'),
('JPJ017', 'OVERTAKE TWIN LINE', '300', 'JPJ'),
('JPJ018', 'PLATE NO.', '100', 'JPJ'),
('JPJ019', 'DARK MIRROR', '100', 'JPJ'),
('JPJ020', 'MODIFY', '100', 'JPJ'),
('JPJ021', 'MAINTAINANCE', '100', 'JPJ'),
('JPJ022', 'NOISE', '100', 'JPJ'),
('JPJ023', 'BROKEN LIGHTS', '150', 'JPJ'),
('JPJ024', 'BROKEN SIGNALS', '150', 'JPJ'),
('JPJ025', 'EXCEEDS PASSENGERS', '100', 'JPJ'),
('JPJ026', 'BROKEN TIRES', '100', 'JPJ'),
('JPJ027', 'INSURANCE', '150', 'JPJ'),
('JPJ028', 'DRIVING LICENSE', '150', 'JPJ'),
('JPJ029', 'FAKE LICENSE', '100', 'JPJ'),
('JPJ030', 'FAKE PLATE NO.', '100', 'JPJ'),
('JPJ031', 'P-SIGNS', '70', 'JPJ'),
('JPJ032', 'LICENSE EXPIRED', '70', 'JPJ'),
('JPJ033', 'UNDERAGE', '100', 'JPJ'),
('JPJ034', 'ALCOHOL', '150', 'JPJ'),
('JPJ035', 'INSTRUCTOR', '70', 'JPJ'),
('JPJ036', 'BROKEN SIDE MIRROR', '100', 'JPJ'),
('JPJ037', 'SEATBELT', '300', 'JPJ'),
('JPJ038', 'HELMET', '300', 'JPJ'),
('JPJ039', 'SLEEP DRIVING', '300', 'JPJ'),
('JPJ040', 'NEGLIGENT', '300', 'JPJ'),
('JPJ041', 'LOST CONTROL', '300', 'JPJ'),
('JPJ042', 'USING DEVICE', '300', 'JPJ'),
('JPJ043', 'BLOCK TRAFFIC', '100', 'JPJ'),
('JPJ044', 'THROW THINGS', '150', 'JPJ'),
('JPJ045', 'EMERGENCY EQUIPMENTS', '70', 'JPJ');














