--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_news`
--

CREATE TABLE `ci_news` (
  `ne_id` int(11) NOT NULL,
  `ne_title` varchar(300) NOT NULL,
  `ne_desc` text NOT NULL COMMENT 'نص الخبر',
  `ne_img` varchar(255) NOT NULL,
  `ne_created` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_news`
--

INSERT INTO `ci_news` (`ne_id`, `ne_title`, `ne_desc`, `ne_img`, `ne_created`) VALUES
(38, 'Climate predicts bird populations\n', 'Populations of the most common bird species in Europe', 'bird.jpg', '1459435234'),
(39, 'Google April Fool Gmail button sparks backlash', 'Google has removed an April Fool''s Gmail button, which sent a comical animation to recipients, after reports of people getting into trouble at work.\n', 'google_splash.jpg', '1459435249');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_news`
--
ALTER TABLE `ci_news`
  ADD PRIMARY KEY (`ne_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_news`
--
ALTER TABLE `ci_news`
  MODIFY `ne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

