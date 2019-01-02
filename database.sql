CREATE TABLE `DHTData` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  `temp` varchar(255),
  `humi` varchar(255),
  `location` varchar(100),
  `timeupdate` timestamp NOT NULL
);
 insert into DHTData(temp,humi,location,timeupdate) values ('15','50','home',now());
