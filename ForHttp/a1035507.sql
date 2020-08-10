-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-01-09 06:56:33
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `a1035507`
--

-- --------------------------------------------------------

--
-- 資料表結構 `activity`
--

CREATE TABLE `activity` (
  `InfoNo` int(3) NOT NULL,
  `ActTitle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ActContent` text COLLATE utf8_unicode_ci NOT NULL,
  `ActLocation` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `ActTime` datetime NOT NULL,
  `ActPicture` char(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NoImage.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `activity`
--

INSERT INTO `activity` (`InfoNo`, `ActTitle`, `ActContent`, `ActLocation`, `ActTime`, `ActPicture`) VALUES
(1, '0', '濬哲打球你當球', '風雨球場', '2017-01-17 00:00:00', '123.jpg'),
(2, '123', '123', '123', '2017-01-06 00:00:00', ''),
(3, '453', '123', '786', '2017-01-06 00:00:00', '.jpg'),
(4, '453', '123', '786', '2017-01-06 00:00:00', '.jpg'),
(5, '456', '323', '456', '2017-01-06 00:00:00', '.jpeg'),
(6, '123', '786', '77', '2017-01-06 00:00:00', '.jpg'),
(7, '786', '786', '876', '2017-01-06 00:00:00', '.jpg'),
(8, '786', '786', '876', '2017-01-06 00:00:00', '786.jpg'),
(9, '786', '786', '876', '2017-01-06 00:00:00', '786.jpeg'),
(10, '789', '786786', '876', '2017-01-06 00:00:00', '789.jpeg'),
(11, '濬哲還錢', '8787', '家', '2017-01-06 22:28:22', '濬哲還錢.jpg'),
(12, '前', '453', '4763', '2017-01-06 22:29:01', '前.jpg'),
(13, '前', '456', '456', '2017-01-06 22:29:31', '前.jpg'),
(14, '123', '453543', '453', '2017-01-06 22:34:36', '123.jpg'),
(15, '八', 'dfgdfg', 'sfdsfg', '2017-01-06 22:42:54', '八.jpg'),
(16, 'ㄎㄎ', '786786786', '4563', '2017-01-06 22:47:07', 'ㄎㄎ.jpg'),
(17, '56', '453', '4563', '2017-01-07 00:27:09', ''),
(18, '56', '453', '4563', '2017-01-07 00:28:03', ''),
(19, '4532', '452453453', '453', '2017-01-07 00:32:17', ''),
(20, '123', '123', '123', '2017-01-07 00:34:39', ''),
(21, '452', '453', '453', '2017-01-07 00:37:23', ''),
(22, '456', '453', '4563', '2017-01-07 00:39:33', '0'),
(23, '453', '453', '453', '2017-01-07 00:41:32', 'NULL'),
(24, '45', '453', '543', '2017-01-07 00:43:36', 'NoImage.png'),
(25, '453', '453', '543', '2017-01-07 00:45:17', 'NoImage.png'),
(26, '453222', '543', '543', '2017-01-07 00:45:29', '453222.jpg'),
(27, 'test', 'QQQQQQQQQQQ', 'RRRRR', '2017-01-09 13:48:00', 'NoImage.png');

-- --------------------------------------------------------

--
-- 資料表結構 `administrator`
--

CREATE TABLE `administrator` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `AdmNo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `administrator`
--

INSERT INTO `administrator` (`Account`, `AdmNo`) VALUES
('a1035533', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `announcement`
--

CREATE TABLE `announcement` (
  `InfoNo` int(3) NOT NULL,
  `AncTitle` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '無標題',
  `AncContent` text COLLATE utf8_unicode_ci NOT NULL,
  `AncTime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `announcement`
--

INSERT INTO `announcement` (`InfoNo`, `AncTitle`, `AncContent`, `AncTime`) VALUES
(1, '王建民振奮!', '旅美棒球好手王建民即將於明日晚間搭乘班機飛往美國，除了他提前為新球季做準備外，也要繼續拚大聯盟春訓的機會。\r\n建仔去年在大聯盟成功以長中繼角色讓人看到他的鬥志跟身手，而他在9月17日因皇家隊要登錄其他投手，所以將他釋出。\r\n總計建仔去年共出賽38場，53.1局，6勝0敗，防禦率4.22。\r\n不過季末返台，他卻語出驚人，說出：「若沒有球隊需要我，將會退休」讓不少球迷十份惋惜。\r\n如今他將提前赴美訓練，也是為了新球季做準備，這位36歲的「台灣之光」將持續他的棒球之路。', '2017-01-24 00:00:00.000000'),
(2, '無標題', '根據馬林魚隊官網報導，旅美強投陳偉殷非常有可能擔任2017年球隊開幕戰的投手，連續兩年獲此殊榮，無疑是馬林魚對於陳偉殷表現的一種肯定。\r\n陳偉殷上一季因傷所苦，並沒能展現自己最好的一面，僅繳出5勝5負、防禦率4.96的成績，123.1局也是他來到大聯盟後投球局數最少的一個球季。\r\n也因此陳偉殷今年冬天婉拒了中華隊的徵召，不參加今年度的經典賽，為的就是希望能好好休養身體，讓受傷的部位能盡早恢復，期望明年球季能回到自己該有的身手。\r\n在下個賽季，陳偉殷在失去Jose Fernandez的馬林魚隊陣中無疑必須得扛下更多責任，明年他將擔任球隊陣中的輪值一哥，完成好友未能完成的任務。', '2017-01-31 00:00:00.000000'),
(4, '888', '666', '2017-01-04 15:52:31.000000'),
(5, 'KKKKKK', '生日', '2017-01-04 15:53:04.000000'),
(6, '5555', '7777', '2017-01-04 15:59:10.000000'),
(7, '476786', '786786', '2017-01-04 15:59:45.000000'),
(8, 'yutuyt', 'tyutyu', '2017-01-04 16:10:37.000000'),
(9, 'tyuityiu', 'tyutyuytu', '2017-01-04 16:11:12.000000'),
(10, 'testtest', 'QQ', '2017-01-09 13:41:09.000000'),
(12, 'test2', 'QQQQQQQ', '2017-01-09 13:42:14.000000'),
(15, 'test3', 'QQQQQQ\r\nQQQQQQQQQ', '2017-01-09 13:42:53.000000'),
(18, 'test5', 'RRRRRRRRR', '2017-01-09 13:45:41.000000');

-- --------------------------------------------------------

--
-- 資料表結構 `employment`
--

CREATE TABLE `employment` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Company` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `Department` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `Position` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `employment`
--

INSERT INTO `employment` (`Account`, `Company`, `Department`, `Position`) VALUES
('a1025533', '台積電', 'IC設計部門', 'IC設計工程師');

-- --------------------------------------------------------

--
-- 資料表結構 `graduate`
--

CREATE TABLE `graduate` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `GradYear` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `graduate`
--

INSERT INTO `graduate` (`Account`, `GradYear`) VALUES
('a1015533', 2016),
('a1015534', 2016),
('a1025533', 0000),
('xcvb', 0000);

-- --------------------------------------------------------

--
-- 資料表結構 `institute`
--

CREATE TABLE `institute` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `InstName` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `DeptName` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Degree` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `institute`
--

INSERT INTO `institute` (`Account`, `InstName`, `DeptName`, `Degree`) VALUES
('a1015533', '國立高雄大學', '資訊工程學系', '碩士'),
('a1025533', '台大', '資工', '碩士');

-- --------------------------------------------------------

--
-- 資料表結構 `learning`
--

CREATE TABLE `learning` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `learning`
--

INSERT INTO `learning` (`Account`) VALUES
('987'),
('a1035533'),
('asd'),
('qwertyu'),
('s'),
('tyu'),
('wsp50317'),
('zxcv');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Password` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `MemNo` int(4) NOT NULL,
  `Name` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `Sex` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `FB` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Line` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `JoinTime` datetime NOT NULL,
  `Photo` char(255) COLLATE utf8_unicode_ci DEFAULT 'NoImage.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`Account`, `Password`, `MemNo`, `Name`, `Sex`, `FB`, `Line`, `Email`, `Phone`, `JoinTime`, `Photo`) VALUES
('987', '987', 8, 'ㄏ', '', '', '', '', '', '2017-01-03 15:38:15', 'NoImage.jpg'),
('a1015533', '1234', 6, 'XXX', '男', '123qw2erqqqqqqqqqqqqqqqqqq', '456qweq54', 'qwesdad123@4561qqqqqqqqqq', '010101001010', '0000-00-00 00:00:00', 'NoImage.jpg'),
('a1015534', '1234', 7, 'YYY', '女', '789', '654', '789@654', '9898989898989', '0000-00-00 00:00:00', 'NoImage.jpg'),
('a1025533', '1234', 4, '安安', '男', '', '', '', '', '2017-01-01 18:52:55', 'a1025533.jpg'),
('a1035533', '1234', 1, '林濬哲', '男', 't0037798@yahoo.com.tw', 'kuprin970', 't0037798@gmail.com', '0979362808', '2017-01-01 16:25:07', 'a1035533.gif'),
('asd', 'asd', 2, '', '', '', '', '', '', '2017-01-01 16:57:34', ''),
('teacher01', '1234', 13, '林文揚', '男', 'test01', 'test01', 'wylin@nuk.edu.tw', '', '2017-01-09 13:19:52', 'teacher01.jpg'),
('tyu', '123', 9, 'QQ', '', '', '', '', '', '2017-01-03 15:39:30', 'NoImage.jpg'),
('wsp50317', '7434961z', 10, '吳阿西', '男', '546', '456', '456', '456', '2017-01-03 23:46:37', 'wsp50317.jpg'),
('xcvb', '1234', 12, 'xcvb', '', '', '', '', '', '2017-01-09 13:16:37', 'NoImage.jpg'),
('zxcv', '1234', 11, 'zxcv', '', '', '', '', '', '2017-01-09 13:16:20', 'NoImage.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `MsgNo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `message`
--

INSERT INTO `message` (`Account`, `MsgNo`) VALUES
('a1025533', 19),
('a1025533', 20),
('a1025533', 21),
('a1035533', 13),
('a1035533', 16),
('a1035533', 17),
('a1035533', 23),
('wsp50317', 22);

-- --------------------------------------------------------

--
-- 資料表結構 `militaryservice`
--

CREATE TABLE `militaryservice` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Condition` char(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `militaryservice`
--

INSERT INTO `militaryservice` (`Account`, `Condition`) VALUES
('a1025533', '已服役'),
('wsp50317', '服役中');

-- --------------------------------------------------------

--
-- 資料表結構 `msgboard`
--

CREATE TABLE `msgboard` (
  `MsgNo` int(4) NOT NULL,
  `MsgContent` text COLLATE utf8_unicode_ci NOT NULL,
  `MsgTo` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `MsgTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `msgboard`
--

INSERT INTO `msgboard` (`MsgNo`, `MsgContent`, `MsgTo`, `MsgTime`) VALUES
(13, '789', '456', '2017-01-03 01:43:32'),
(16, 'qw', 'qe', '2017-01-03 17:11:39'),
(17, '123 456 789', '123', '2017-01-03 17:13:35'),
(19, 'WTF?????', '幹', '2017-01-03 17:34:08'),
(20, '成功了喔喔喔喔喔QQQQQQQQQQQ', 'QQ', '2017-01-03 17:37:24'),
(21, '我\r\n就\r\n是\r\n要\r\n分\r\n行\r\n!\r\n!\r\n!\r\n!\r\n爽\r\n!', '再一次', '2017-01-03 17:40:22'),
(22, '123123', '123', '2017-01-05 17:48:59'),
(23, '8787', '123', '2017-01-06 23:29:21');

-- --------------------------------------------------------

--
-- 資料表結構 `msgmanage`
--

CREATE TABLE `msgmanage` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `MsgNo` int(4) NOT NULL,
  `ModTime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `participate`
--

CREATE TABLE `participate` (
  `InfoNo` int(5) NOT NULL,
  `Account` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `questionnaire`
--

CREATE TABLE `questionnaire` (
  `InfoNo` int(3) NOT NULL,
  `QuesNo` int(3) NOT NULL,
  `QuesContent` text COLLATE utf8_unicode_ci NOT NULL,
  `QuesResult` text COLLATE utf8_unicode_ci NOT NULL,
  `QuesTime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `StdID` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DeptLevel` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `student`
--

INSERT INTO `student` (`Account`, `StdID`, `DeptLevel`) VALUES
('987', '', 0),
('a1015533', 'A1015533', 105),
('a1015534', 'A1015534', 105),
('a1025533', '', 0),
('a1035533', 'A1035533', 107),
('asd', '', 0),
('qwertyu', '', 0),
('tyu', '', 0),
('wsp50317', 'a1035507', 103),
('xcvb', '', 0),
('zxcv', '', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `teacher`
--

CREATE TABLE `teacher` (
  `Account` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Office` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `Lab` char(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `teacher`
--

INSERT INTO `teacher` (`Account`, `Office`, `Lab`) VALUES
('teacher01', '法學院411室', '智慧型計算實驗室');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`InfoNo`);

--
-- 資料表索引 `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`Account`);

--
-- 資料表索引 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`InfoNo`);

--
-- 資料表索引 `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`Account`);

--
-- 資料表索引 `graduate`
--
ALTER TABLE `graduate`
  ADD PRIMARY KEY (`Account`);

--
-- 資料表索引 `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`Account`);

--
-- 資料表索引 `learning`
--
ALTER TABLE `learning`
  ADD PRIMARY KEY (`Account`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Account`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Account`,`MsgNo`);

--
-- 資料表索引 `militaryservice`
--
ALTER TABLE `militaryservice`
  ADD PRIMARY KEY (`Account`);

--
-- 資料表索引 `msgboard`
--
ALTER TABLE `msgboard`
  ADD PRIMARY KEY (`MsgNo`);

--
-- 資料表索引 `msgmanage`
--
ALTER TABLE `msgmanage`
  ADD PRIMARY KEY (`Account`,`MsgNo`);

--
-- 資料表索引 `participate`
--
ALTER TABLE `participate`
  ADD PRIMARY KEY (`InfoNo`,`Account`);

--
-- 資料表索引 `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`InfoNo`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Account`);

--
-- 資料表索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Account`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `activity`
--
ALTER TABLE `activity`
  MODIFY `InfoNo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用資料表 AUTO_INCREMENT `announcement`
--
ALTER TABLE `announcement`
  MODIFY `InfoNo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 使用資料表 AUTO_INCREMENT `msgboard`
--
ALTER TABLE `msgboard`
  MODIFY `MsgNo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
