
CREATE TABLE `tbl_theatre` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_theatre`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;





CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;





CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL UNIQUE,
  `email` varchar(50) NOT NULL UNIQUE,
  `phone` varchar(12) NOT NULL UNIQUE,
  `age` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;





CREATE TABLE `tbl_movie` (
  `movie_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `movie_name` varchar(255) NOT NULL UNIQUE,
  `cast` varchar(500) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) NOT NULL UNIQUE,
  `video_url` varchar(200) NOT NULL UNIQUE,
  `status` int(1) NOT NULL COMMENT '0 means active ',
   FOREIGN KEY (t_id) REFERENCES tbl_theatre(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`);

ALTER TABLE `tbl_movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT;




CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `name` varchar(45) UNIQUE NOT NULL,
  `cast` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;



CREATE TABLE `tbl_screens` (
  `screen_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'number of seats',
  `charge` int(11) NOT NULL,
   FOREIGN KEY (t_id) REFERENCES tbl_theatre(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `tbl_screens`
  ADD PRIMARY KEY (`screen_id`);

ALTER TABLE `tbl_screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT;




CREATE TABLE `tbl_show_time` (
  `st_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL COMMENT 'noon,second,etc',
  `start_time` time NOT NULL,
   FOREIGN KEY (screen_id) REFERENCES tbl_screens(screen_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `tbl_show_time`
  ADD PRIMARY KEY (`st_id`);

ALTER TABLE `tbl_show_time`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;




CREATE TABLE `tbl_shows` (
  `s_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `theatre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL,
   FOREIGN KEY (theatre_id) REFERENCES tbl_theatre(id),
   FOREIGN KEY (st_id) REFERENCES tbl_show_time(st_id),
   FOREIGN KEY (movie_id) REFERENCES tbl_movie(movie_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_shows`
  ADD PRIMARY KEY (`s_id`);

ALTER TABLE `tbl_shows`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;




CREATE TABLE `tbl_bookings` (
  `booking_id` int(5) NOT NULL,
  `ticket_id` varchar(30) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theater id',
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'number of seats',
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
   FOREIGN KEY (user_id) REFERENCES tbl_registration(user_id),
   FOREIGN KEY (show_id) REFERENCES tbl_shows(s_id),
   FOREIGN KEY (t_id) REFERENCES tbl_theatre(id),
   FOREIGN KEY (screen_id) REFERENCES tbl_screens(screen_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`booking_id`);

ALTER TABLE `tbl_bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;





CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL UNIQUE COMMENT 'email',
  `password` varchar(50) NOT NULL,
  `usertype` int(2) NOT NULL COMMENT '0 for admin 1 for theatre 2 for users'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
 
INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `password`, `usertype`) VALUES
(1, 0, 'admin1', 'pw123', 0);

ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;



