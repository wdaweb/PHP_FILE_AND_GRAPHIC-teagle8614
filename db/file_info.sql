-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-22 09:34:26
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `file`
--

-- --------------------------------------------------------

--
-- 資料表結構 `file_info`
--

CREATE TABLE `file_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '檔名',
  `type` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '圖片類型',
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '描述',
  `path` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '放置位置',
  `album` int(5) UNSIGNED NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `file_info`
--

INSERT INTO `file_info` (`id`, `filename`, `type`, `note`, `path`, `album`, `upload_time`) VALUES
(2, 'img_20200522010921.jpg', 'image/jpeg', '摸手手', 'img/img_20200522010921.jpg', 1, '2020-05-22 05:09:21'),
(6, 'img_20200522011351.jpg', 'image/jpeg', '貓貓貓', 'img/img_20200522011351.jpg', 1, '2020-05-22 05:13:51'),
(7, 'img_20200522143717.jpg', 'image/jpeg', '箱貓2', 'img/img_20200522143717.jpg', 2, '2020-05-22 06:07:00'),
(8, 'img_20200522150057.jpg', 'image/jpeg', '金針花123132', 'img/img_20200522150057.jpg', 2, '2020-05-22 06:07:12'),
(9, 'img_20200522031221.jpg', 'image/jpeg', '花花', 'img/img_20200522031221.jpg', 3, '2020-05-22 07:12:21');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `file_info`
--
ALTER TABLE `file_info`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `file_info`
--
ALTER TABLE `file_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
