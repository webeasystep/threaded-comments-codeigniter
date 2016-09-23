--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `ne_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `comment_name` varchar(100) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_state` tinyint(1) NOT NULL DEFAULT '0',
  `comment_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `ne_id`, `parent_id`, `comment_name`, `comment_email`, `comment_body`, `comment_state`, `comment_created`) VALUES
(1, 38, 0, 'first comeent', 'firs@yahoo.com', 'first comeent', 0, 0),
(2, 38, 1, 'second comeent', 'firs@yahoo.com', 'second comeent', 0, 0),
(3, 38, 2, 'third comeent', 'firs@yahoo.com', 'third comeent', 0, 0),
(4, 39, 0, 'Fourth comeent', 'firs@yahoo.com', 'Fourth comeent', 0, 0),
(5, 38, 0, 'AHMED FAKHR', 'spcialist@gmail.com', 'yawaaaaaad yagamed', 0, 1474582677),
(6, 38, 5, 'AHMED FAKHR', 'spcialist@gmail.com', 'ana awstaz bfdl ellah', 0, 1474582695),
(7, 38, 6, 'fakhrawy', 'spcialist@gmail.com', 'no problem', 0, 1474582713);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
