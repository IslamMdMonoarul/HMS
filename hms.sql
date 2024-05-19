CREATE TABLE `appointments` (
  `id` int(100) NOT NULL,
  `pID` varchar(100) NOT NULL,
  `pFirstName` varchar(100) NOT NULL,
  `pLastName` varchar(100) NOT NULL,
  `pAge` varchar(100) NOT NULL,
  `pGender` varchar(100) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `last_diagnosed` varchar(1000) NOT NULL,
  `history` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `appointments` (`id`, `pID`, `pFirstName`, `pLastName`, `pAge`, `pGender`, `disease`, `last_diagnosed`, `history`, `phone`) VALUES
(2, 'P2201', 'Babul', 'Akhter', '45', 'Male', 'Heart Disease', '2 months ago', 'high bp, has diabetes', '01732145697'),
(7, 'P2202', 'Alaulla', 'Jubayer', '62', 'Male', 'Sterosis', '3 months ago', 'has lumbar spinal stenosis', '01745874563');
(7, 'P2202', 'Alaulla', 'Jubayer', '62', 'Male', 'Sterosis', '3 months ago', 'has lumbar spinal stenosis', '01745874563');
(7, 'P2202', 'Alaulla', 'Jubayer', '62', 'Male', 'Sterosis', '3 months ago', 'has lumbar spinal stenosis', '01745874563');


CREATE TABLE `notice` (
  `id` int(100) NOT NULL,
  `notices` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `notice` (`id`, `notices`, `date`) VALUES
(1, 'Vecation: Wednesday 30-11-2022. For special occation there will be vecation on the 30th of November', '28-11-2022');


CREATE TABLE `prescription` (
  `id` int(100) NOT NULL,
  `pID` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `dosage` varchar(100) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `instruction` varchar(100) NOT NULL,
  `medicalDiagonosis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `prescription` (`id`, `pID`, `firstName`, `lastName`, `medicine`, `dosage`, `link`, `instruction`, `medicalDiagonosis`) VALUES
(1, 'P2201', 'Babul', 'Akhter', 'Alactone', '0-0-1', 'https://meet.google.com/qux-elfh-wqc', 'password 8527', 'Echocardiogram'),
(2, 'P2202', 'Alaulla', 'Jubayer', 'Inspra', '1-0-1', 'https://meet.google.com/qux-uhbg-wqc', 'password 9516', 'Electrocardiogram'),
(4, 'P2201', 'Babul', 'Akhter', 'Digoxin', '1-0-1', 'https://meet.google.com/qux-elfh-wqc', 'password 8527', 'Coronary Angiogram');


CREATE TABLE `users` (
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `accNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`firstName`, `lastName`, `userName`, `email`, `password`, `phone`, `bank`, `accNo`) VALUES
('Farhan', 'Chowdhury', 'fxFarhan', 'farhan@gmail.com', '123', '01479874563', 'ificBank', '789654123963'),
('Hasnat', 'Akash', 'hAkash', 'hasnat@gmail.com', '123', '01234567899', 'dhkBank', '123855456951'),
('Monzurul Kabir', 'Zhanda', 'mKabir', 'monzurul@gmail.com', '321', '01478523678', 'dhkBank', '789654123963'),
('Tahamid', 'Rafin', 'tRafin', 'rafin@gmail.com', '123', '01478523691', 'brackBank', '987456321741');


ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `userName` (`userName`);

ALTER TABLE `appointments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `notice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `prescription`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
