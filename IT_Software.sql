USE [master]
GO
/****** Object:  Database [IT_Software]    Script Date: 23-05-2022 12.29.47 PM ******/
CREATE DATABASE [IT_Software]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'IT_Software', FILENAME = N'C:\Program Files (x86)\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\IT_Software.mdf' , SIZE = 4096KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'IT_Software_log', FILENAME = N'C:\Program Files (x86)\Microsoft SQL Server\MSSQL11.SQLEXPRESS\MSSQL\DATA\IT_Software_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [IT_Software] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [IT_Software].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [IT_Software] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [IT_Software] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [IT_Software] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [IT_Software] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [IT_Software] SET ARITHABORT OFF 
GO
ALTER DATABASE [IT_Software] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [IT_Software] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [IT_Software] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [IT_Software] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [IT_Software] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [IT_Software] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [IT_Software] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [IT_Software] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [IT_Software] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [IT_Software] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [IT_Software] SET  DISABLE_BROKER 
GO
ALTER DATABASE [IT_Software] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [IT_Software] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [IT_Software] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [IT_Software] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [IT_Software] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [IT_Software] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [IT_Software] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [IT_Software] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [IT_Software] SET  MULTI_USER 
GO
ALTER DATABASE [IT_Software] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [IT_Software] SET DB_CHAINING OFF 
GO
ALTER DATABASE [IT_Software] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [IT_Software] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
USE [IT_Software]
GO
/****** Object:  Table [dbo].[Data]    Script Date: 23-05-2022 12.29.47 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Data](
	[Sr_no] [bigint] IDENTITY(1,1) NOT NULL,
	[Work_Name] [nvarchar](200) NULL,
	[Plateform] [nvarchar](100) NULL,
	[Assign_Date] [date] NULL,
	[estimated_days] [nvarchar](50) NULL,
	[Status] [nvarchar](100) NULL,
	[Location] [nvarchar](100) NULL,
	[Remark] [nvarchar](200) NULL,
	[Given_By] [nvarchar](100) NULL,
	[ApproxFinish_Date] [date] NULL,
	[Dev_By] [nvarchar](100) NULL,
	[Current_Finish] [date] NULL,
	[Delay] [nvarchar](50) NULL,
	[Satus] [nvarchar](200) NULL,
	[Create_By] [nvarchar](100) NULL,
	[Create_Date] [datetime] NULL,
	[Edit_By] [nvarchar](100) NULL,
	[Edit_Date] [date] NULL,
	[Del_Flag] [bit] NULL,
 CONSTRAINT [PK_Data] PRIMARY KEY CLUSTERED 
(
	[Sr_no] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[M_DevBy]    Script Date: 23-05-2022 12.29.47 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[M_DevBy](
	[Sr_no] [bigint] IDENTITY(1,1) NOT NULL,
	[Dev_by] [nvarchar](50) NULL,
	[isdelete] [int] NULL,
 CONSTRAINT [PK_M_DevBy] PRIMARY KEY CLUSTERED 
(
	[Sr_no] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[M_Location]    Script Date: 23-05-2022 12.29.47 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[M_Location](
	[Sr_no] [bigint] IDENTITY(1,1) NOT NULL,
	[Location] [nvarchar](50) NULL,
	[isdelete] [int] NULL,
 CONSTRAINT [PK_M_Location] PRIMARY KEY CLUSTERED 
(
	[Sr_no] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[M_Plateform]    Script Date: 23-05-2022 12.29.47 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[M_Plateform](
	[Sr_no] [bigint] IDENTITY(1,1) NOT NULL,
	[Plateform] [nvarchar](100) NULL,
	[isdelete] [int] NULL,
 CONSTRAINT [PK_M_Plateform] PRIMARY KEY CLUSTERED 
(
	[Sr_no] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[M_Status]    Script Date: 23-05-2022 12.29.47 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[M_Status](
	[Sr_no] [bigint] IDENTITY(1,1) NOT NULL,
	[Status] [nvarchar](50) NULL,
	[isdelete] [int] NULL,
 CONSTRAINT [PK_M_Status] PRIMARY KEY CLUSTERED 
(
	[Sr_no] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET IDENTITY_INSERT [dbo].[Data] ON 

INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10074, N'New Stock System Online', N'PHP-SQL', CAST(0x19430B00 AS Date), N'40', N'running', N'Halol', N'New from Excel to PHP Online', N'Snehal', CAST(0x41430B00 AS Date), N'Rajnish', CAST(0xA9430B00 AS Date), N'104', N'Running', N'', CAST(0x0000AE4E00DBEB48 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10075, N'RG online System', N'PHP-SQL', CAST(0xE6420B00 AS Date), N'30', N'running', N'Halol', N'NEW', N'snehal', CAST(0x04430B00 AS Date), N'Rajnish', CAST(0xA9430B00 AS Date), N'165', N'Running', N'', CAST(0x0000AE4E00DBEB4F AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10077, N'Costing Software SQL', N'PHP-SQL', CAST(0xAA430B00 AS Date), N'15', N'running', N'Baroda', N'NEW', N'snehal', CAST(0xB9430B00 AS Date), N'Rajnish + Sangita', CAST(0xA9430B00 AS Date), N'-16', N'Running', N'', CAST(0x0000AE4E00DBEB5B AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10078, N'Extra Workers Billing System (EWP)', N'PHP-SQL', CAST(0xE6420B00 AS Date), N'30', N'running', N'Halol', N'scrap weight live with contractor and team', N'snehal', CAST(0x04430B00 AS Date), N'Sangita', CAST(0xA9430B00 AS Date), N'165', N'Running', N'', CAST(0x0000AE4E00DBEB61 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10079, N'Consumption System PHP', N'PHP-SQL', CAST(0x96430B00 AS Date), N'30', N'running', N'Baroda', N'NEW', N'snehal', CAST(0xB4430B00 AS Date), N'Sangita', CAST(0xA9430B00 AS Date), N'-11', N'Running', N'', CAST(0x0000AE4E00DBEB68 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10080, N'CRM Software SQL', N'PHP-SQL', CAST(0xAA430B00 AS Date), N'15', N'Completed', N'Baroda', N'NEW', N'snehal', CAST(0xB9430B00 AS Date), N'Sangita', CAST(0xD2430B00 AS Date), N'25', N'complete', N'', CAST(0x0000AE4E00DBEB6E AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10081, N'GTP Software SQL', N'PHP-SQL', CAST(0xAA430B00 AS Date), N'15', N'running', N'Baroda', N'NEW', N'snehal', CAST(0xB9430B00 AS Date), N'Sangita', CAST(0xA9430B00 AS Date), N'-16', N'Running', N'', CAST(0x0000AE4E00DBEB74 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10082, N'PO Software SQL', N'PHP-SQL', CAST(0xB0430B00 AS Date), N'30', N'running', N'Baroda', N'NEW', N'snehal', CAST(0xCE430B00 AS Date), N'Sangita', CAST(0xA9430B00 AS Date), N'-37', N'Running', N'', CAST(0x0000AE4E00DBEB7A AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10083, N'Payment Followup System', N'PHP-SQL', CAST(0xA0430B00 AS Date), N'30', N'running', N'Baroda', N'NEW', N'snehal', CAST(0xBE430B00 AS Date), N'Sangita', CAST(0xA9430B00 AS Date), N'-21', N'Running', N'', CAST(0x0000AE4E00DBEB80 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10084, N'Workbook Dept. wise Report', N'PHP-SQL', CAST(0xA1430B00 AS Date), N'5', N'Completed', N'Baroda', N'NEW', N'snehal', CAST(0xA6430B00 AS Date), N'Sangita', CAST(0xBA430B00 AS Date), N'20', N'complete', N'', CAST(0x0000AE4E00DBEB86 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10085, N'Disptch Form New Design', N'PHP-SQL', CAST(0xA5430B00 AS Date), N'5', N'running', N'Baroda', N'Modification', N'snehal', CAST(0xAA430B00 AS Date), N'Sangita', CAST(0xA9430B00 AS Date), N'-1', N'Running', N'', CAST(0x0000AE4E00DBEB8C AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10086, N'Cash Memo (RM Software)', N'PHP-SQL', CAST(0xA0430B00 AS Date), N'20', N'pending', N'Halol', N'NEW', N'snehal', CAST(0xB4430B00 AS Date), N'Sangita', CAST(0xA9430B00 AS Date), N'-11', N'Running', N'', CAST(0x0000AE4E00DBEB92 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10087, N'IT Hardware System', N'PHP-SQL', CAST(0x91430B00 AS Date), N'30', N'Completed', N'Baroda', N'NEW', N'snehal', CAST(0xAF430B00 AS Date), N'Jonsi', CAST(0xD6430B00 AS Date), N'39', N'complete', N'', CAST(0x0000AE4E00DBEB98 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10088, N'Client Approval Record System', N'PHP-SQL', CAST(0xA4430B00 AS Date), N'20', N'pending', N'Baroda', N'NEW', N'Snehal', CAST(0xB8430B00 AS Date), N'Jonsi', CAST(0xA9430B00 AS Date), N'40', N'Not start yet', N'', CAST(0x0000AE4E00DBEB9E AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10089, N'IT Software Portal', N'PHP-SQL', CAST(0xA5430B00 AS Date), N'10', N'Completed', N'Baroda', N'NEW', N'Snehal', CAST(0xAF430B00 AS Date), N'Jonsi', CAST(0xA9430B00 AS Date), N'-6', N'complete', N'', CAST(0x0000AE4E00DBEBE2 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10091, N'GTP Software', N'PHP-SQL', CAST(0x49420B00 AS Date), N'30', N'running', N'Baroda', N'new', N'snehal', CAST(0x67420B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'322', N'Running', N'', CAST(0x0000AE4E00DBEBEF AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10092, N'Transport Billing System - Bhavesh to Account', N'PHP-SQL', CAST(0xE1420B00 AS Date), N'30', N'running', N'Baroda', N'new', N'Snehal', CAST(0xFF420B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'170', N'Running', N'', CAST(0x0000AE4E00DBEBF6 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10093, N'Online All Process Jobcard After Laidup', N'PHP-SQL', CAST(0xF0420B00 AS Date), N'30', N'running', N'Halol', N'New', N'Manish', CAST(0x0E430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'155', N'Handle by manish', N'', CAST(0x0000AE4E00DBEBFD AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10094, N'Copper Plant  Jobcard', N'PHP-SQL', CAST(0x04430B00 AS Date), N'40', N'running', N'Halol', N'new', N'Bimal Sir', CAST(0x2C430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'125', N'Start after jobcard process', N'', CAST(0x0000AE4E00DBEC03 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10095, N'Freq. Report- NEW 10 M/c', N'PLC', CAST(0xF0420B00 AS Date), N'30', N'running', N'Halol', N'new', N'Amey', CAST(0x0E430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'155', N'Handle by manish', N'', CAST(0x0000AE4E00DBEC0A AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10096, N'PLC Report No. - 3 & 4 Error Code', N'PLC', CAST(0xF0420B00 AS Date), N'30', N'running', N'Halol', N'new', N'Amey', CAST(0x0E430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'155', N'Handle by manish', N'', CAST(0x0000AE4E00DBEC21 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10097, N'RBD-1 & RBD-2 Data Error - PLC', N'PLC', CAST(0xF0420B00 AS Date), N'30', N'running', N'Halol', N'Error', N'Manish', CAST(0x0E430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'155', N'Handle by manish', N'', CAST(0x0000AE4E00DBEC3D AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10098, N'PLC add new 2 Pairing Machine (Transfer) 7 & 9', N'PLC', CAST(0xF0420B00 AS Date), N'30', N'running', N'Halol', N'new', N'Manish', CAST(0x0E430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'155', N'Handle by manish', N'', CAST(0x0000AE4E00DBEC43 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10099, N'Report no. 14 Man Power Highlight', N'PLC', CAST(0xF0420B00 AS Date), N'30', N'running', N'Halol', N'new', N'Manish', CAST(0x0E430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'155', N'Handle by manish', N'', CAST(0x0000AE4E00DBEC49 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10100, N'Prod. Software Changes', N'Prod', CAST(0xF0420B00 AS Date), N'30', N'running', N'Halol', N'update / new', N'Bimal Sir / Amey', CAST(0x0E430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'155', N'Handle by manish', N'', CAST(0x0000AE4E00DBEC4F AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10101, N'Dispatch Challan Packing List', N'PHP-SQL', CAST(0x18430B00 AS Date), N'20', N'running', N'Halol', N'New', N'Nishant', CAST(0x2C430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'125', N'Handle by manish', N'', CAST(0x0000AE4E00DBEC55 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10102, N'Umang LAB Tesing App Changes', N'PHP', CAST(0xF0420B00 AS Date), N'30', N'running', N'Halol', N'update / new', N'Bimal Sir', CAST(0x0E430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'155', N'Handle by manish', N'', CAST(0x0000AE4E00DBEC5B AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (10103, N'LAB Testing Software', N'PHP', CAST(0xA1430B00 AS Date), N'30', N'Pending', N'Halol', N'Merge And New', N'Bimal Sir', CAST(0xBF430B00 AS Date), N'Rahul', CAST(0xA9430B00 AS Date), N'-22', N'Not Start Yet', N'', CAST(0x0000AE4E00DBEC61 AS DateTime), N'', NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (30092, N'RM-Software', N'PHP-SQL', CAST(0xAD430B00 AS Date), N'10', N'Not Start', N'Baroda', N'Add new Module  of  Matirial Approve for Payment', N'Snehal Jagdishbhai Patel', CAST(0xB7430B00 AS Date), N'Rajnish', NULL, N'-9', NULL, NULL, CAST(0x0000AE520130D760 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (30093, N'Scrap System', N'PHP-SQL', CAST(0xAF430B00 AS Date), N'3', N'Not Start', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xB2430B00 AS Date), N'Sangita', NULL, N'-3', NULL, NULL, CAST(0x0000AE5400EE3709 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (40092, N'PLC Dashboard', N'PHP-SQL', CAST(0xB3430B00 AS Date), N'30', N'Not Start', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xD1430B00 AS Date), N'Jonsi', NULL, N'-29', NULL, NULL, CAST(0x0000AE58013749C4 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (40093, N'Inward_outward', N'PHP-SQL', CAST(0xBA430B00 AS Date), N'2', N'Running', N'Baroda', N'Discuss with rahul sir', N'Snehal Jagdishbhai Patel', CAST(0xBC430B00 AS Date), N'Rajnish', NULL, N'-2', NULL, NULL, CAST(0x0000AE5F010D3C78 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (40094, N'Under_Maintanance', N'PHP-MySQL', CAST(0xBA430B00 AS Date), N'1', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xBB430B00 AS Date), N'Jonsi', CAST(0xBB430B00 AS Date), N'0', N'complete', NULL, CAST(0x0000AE6001073A73 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50093, N'calander_reminder', N'PHP-SQL', CAST(0xD3430B00 AS Date), N'6', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xD9430B00 AS Date), N'Jonsi', CAST(0xD6430B00 AS Date), N'-3', N'complete', NULL, CAST(0x0000AE790122FEF4 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50094, N'inventry_machine', N'PHP-SQL', CAST(0xD3430B00 AS Date), N'4', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xD7430B00 AS Date), N'Jonsi', CAST(0xE2430B00 AS Date), N'11', N'complete', NULL, CAST(0x0000AE790123501C AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50095, N'Trip-Voting', N'PHP-SQL', CAST(0xAE430B00 AS Date), N'3', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xB1430B00 AS Date), N'Sangita', CAST(0xAF430B00 AS Date), N'-2', N'complete', NULL, CAST(0x0000AE7B00FF3785 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50096, N'Lab-Test', N'PHP-SQL', CAST(0xA7430B00 AS Date), N'5', N'Completed', N'Baroda', N'PVC-inward link with RM-Software and create daynamacally test graph', N'Amey Desai', CAST(0xAC430B00 AS Date), N'Rajnish', CAST(0xAD430B00 AS Date), N'1', N'complete', NULL, CAST(0x0000AE7B01016229 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50097, N'IEEMA', N'Excel', CAST(0xB0430B00 AS Date), N'2', N'Completed', N'Baroda', N'Offere rate auto calculate only with copy paste', N'Haresh P Hansoti', CAST(0xB2430B00 AS Date), N'Rajnish', CAST(0xB8430B00 AS Date), N'6', N'complete', NULL, CAST(0x0000AE7B0102345A AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50098, N'Costing Rate', N'Excel', CAST(0xB8430B00 AS Date), N'4', N'Running', N'Baroda', N'As per size rate auto calculate', N'Haresh P Hansoti', CAST(0xBC430B00 AS Date), N'Rajnish', NULL, N'26', NULL, NULL, CAST(0x0000AE7B01030D34 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50099, N'HR', N'PHP-SQL', CAST(0x8C430B00 AS Date), N'2', N'Completed', N'Baroda', N'As per given date intevel data automatically export from sql to excel', N'Snehal Jagdishbhai Patel', CAST(0x8E430B00 AS Date), N'Rajnish', CAST(0x8E430B00 AS Date), N'0', N'complete', NULL, CAST(0x0000AE7B0103F263 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50100, N'CRM', N'Excel', CAST(0xC6430B00 AS Date), N'2', N'Completed', N'Baroda', N'inquary data as per bimal sir linked  with excel for report', N'Bimal Desai', CAST(0xC8430B00 AS Date), N'Rajnish', CAST(0xC8430B00 AS Date), N'0', N'complete', NULL, CAST(0x0000AE7B01048DEB AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50101, N'EMMA', N'Excel', CAST(0xCB430B00 AS Date), N'2', N'Completed', N'Baroda', N'EMMA rate daynamic graph ', N'Bimal Desai', CAST(0xCD430B00 AS Date), N'Rajnish', CAST(0xCF430B00 AS Date), N'2', N'complete', NULL, CAST(0x0000AE7B010541EF AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50102, N'EMMA', N'Excel', CAST(0xD0430B00 AS Date), N'1', N'Completed', N'Baroda', N'EMMA rate difference auto calculate', N'Bimal Desai', CAST(0xD1430B00 AS Date), N'Rajnish', CAST(0xD1430B00 AS Date), N'0', N'complete', NULL, CAST(0x0000AE7B0105BCF7 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50103, N'Laravel', N'PHP-SQL', CAST(0xCF430B00 AS Date), N'30', N'Running', N'Baroda', N'learning for upcoming big project', N'Rajnishkumar Thakur', CAST(0xED430B00 AS Date), N'Rajnish', NULL, N'-23', NULL, NULL, CAST(0x0000AE7B0106633F AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50104, N'Costing', N'Excel', CAST(0xD3430B00 AS Date), N'1', N'Completed', N'Baroda', N'PVG rate auto calculate', N'Hardik Joshi', CAST(0xD4430B00 AS Date), N'Rajnish', CAST(0xD3430B00 AS Date), N'-1', N'complete', NULL, CAST(0x0000AE7B0106E813 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50105, N'Stock', N'Excel', CAST(0xD4430B00 AS Date), N'2', N'Not Start', N'Baroda', N'PVC comparision as per production and machine issue ', N'Jitendra Gupta', CAST(0xD6430B00 AS Date), N'Rajnish', NULL, N'0', NULL, NULL, CAST(0x0000AE7B0108D84C AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50106, N'Backword_Calc', N'PHP-SQL', CAST(0x6E430B00 AS Date), N'30', N'Running', N'Baroda', N'Matirial grade entry and auto calcute grade wise waight', N'Amey Desai', CAST(0x8C430B00 AS Date), N'Rajnish', NULL, N'74', NULL, NULL, CAST(0x0000AE7B010A0898 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50107, N'Purchase Report', N'Excel', CAST(0x5A430B00 AS Date), N'5', N'Running', N'Baroda', N'purchase data linked to excel for report', N'Pratik Chavda', CAST(0x5F430B00 AS Date), N'Rajnish', NULL, N'119', NULL, NULL, CAST(0x0000AE7B010AC397 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50108, N'Data_Bank', N'PHP-MySQL', CAST(0xD6430B00 AS Date), N'3', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xD9430B00 AS Date), N'Jonsi', CAST(0xE9430B00 AS Date), N'16', N'complete', NULL, CAST(0x0000AE7B010CB390 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50109, N'RM-Software', N'PHP-SQL', CAST(0xD2430B00 AS Date), N'10', N'Not Start', N'Baroda', N'PO edit after purchase on special login ', N'Amey Desai', CAST(0xDC430B00 AS Date), N'Rajnish', NULL, N'-5', NULL, NULL, CAST(0x0000AE7C00AF7244 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50110, N'RM-Software', N'PHP-SQL', CAST(0xD2430B00 AS Date), N'15', N'Not Start', N'Baroda', N'After PO given if user change item name then auto mail to paticular given id', N'Amey Desai', CAST(0xE1430B00 AS Date), N'Rajnish', NULL, N'-10', NULL, NULL, CAST(0x0000AE7C00AFF40D AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (50111, N'RM-Software', N'PHP-SQL', CAST(0xD7430B00 AS Date), N'4', N'Not Start', N'Baroda', N'rubber matirial issue change from group wise to individual ', N'Amey Desai', CAST(0xDB430B00 AS Date), N'Jonsi', NULL, N'-4', NULL, NULL, CAST(0x0000AE7C00B0A992 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (60093, N'Car Policy in workbook', N'PHP-SQL', CAST(0xDF430B00 AS Date), N'5', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xE4430B00 AS Date), N'Jonsi', CAST(0xF4430B00 AS Date), N'16', N'complete', NULL, CAST(0x0000AE8400D6B8A1 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (60094, N'Out side duety form', N'PHP-SQL', CAST(0xDF430B00 AS Date), N'10', N'Running', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xE9430B00 AS Date), N'Sangita+Jonsi', NULL, N'-10', NULL, NULL, CAST(0x0000AE8400D7196A AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (70093, N'Safety policy and Safety penalty in HR', N'PHP-SQL', CAST(0xE1430B00 AS Date), N'5', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xE6430B00 AS Date), N'Sangita', CAST(0xE4430B00 AS Date), N'-2', N'complete', NULL, CAST(0x0000AE8C009A3011 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (70094, N'Vendor rating', N'PHP-SQL', CAST(0xF2430B00 AS Date), N'10', N'Running', N'Halol', N'new', N'Snehal Jagdishbhai Patel', CAST(0xFC430B00 AS Date), N'Sangita', NULL, N'-10', NULL, NULL, CAST(0x0000AE9700B7C28C AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (80094, N'po booking', N'PHP-SQL', CAST(0xF5430B00 AS Date), N'10', N'Running', N'Halol', N'new', N'Snehal Jagdishbhai Patel', CAST(0xFF430B00 AS Date), N'Jonsi', NULL, N'-9', NULL, NULL, CAST(0x0000AE9A01303271 AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (80095, N'CTC Calculation SHEET in workbook', N'PHP-SQL', CAST(0xF5430B00 AS Date), N'3', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xF8430B00 AS Date), N'Sangita', CAST(0xF6430B00 AS Date), N'-2', N'complete', NULL, CAST(0x0000AE9C00A5124C AS DateTime), NULL, NULL, NULL)
INSERT [dbo].[Data] ([Sr_no], [Work_Name], [Plateform], [Assign_Date], [estimated_days], [Status], [Location], [Remark], [Given_By], [ApproxFinish_Date], [Dev_By], [Current_Finish], [Delay], [Satus], [Create_By], [Create_Date], [Edit_By], [Edit_Date], [Del_Flag]) VALUES (80096, N'mobile polic workbooky', N'PHP-SQL', CAST(0xF5430B00 AS Date), N'2', N'Completed', N'Baroda', N'new', N'Snehal Jagdishbhai Patel', CAST(0xF7430B00 AS Date), N'Jonsi', CAST(0xF6430B00 AS Date), N'-1', N'complete', NULL, CAST(0x0000AE9C00A68E05 AS DateTime), NULL, NULL, NULL)
SET IDENTITY_INSERT [dbo].[Data] OFF
SET IDENTITY_INSERT [dbo].[M_DevBy] ON 

INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (1, N'Snehal', NULL)
INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (2, N'Manish', NULL)
INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (3, N'Rajnish', NULL)
INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (4, N'Sangita', NULL)
INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (5, N'Jonsi', NULL)
INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (6, N'Rahul', NULL)
INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (7, N'Rajnish+Sangita', NULL)
INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (8, N'Rajnish+Rahul', NULL)
INSERT [dbo].[M_DevBy] ([Sr_no], [Dev_by], [isdelete]) VALUES (9, N'Sangita+Jonsi', NULL)
SET IDENTITY_INSERT [dbo].[M_DevBy] OFF
SET IDENTITY_INSERT [dbo].[M_Location] ON 

INSERT [dbo].[M_Location] ([Sr_no], [Location], [isdelete]) VALUES (1, N'Baroda', NULL)
INSERT [dbo].[M_Location] ([Sr_no], [Location], [isdelete]) VALUES (2, N'Halol', NULL)
INSERT [dbo].[M_Location] ([Sr_no], [Location], [isdelete]) VALUES (3, N'All', NULL)
SET IDENTITY_INSERT [dbo].[M_Location] OFF
SET IDENTITY_INSERT [dbo].[M_Plateform] ON 

INSERT [dbo].[M_Plateform] ([Sr_no], [Plateform], [isdelete]) VALUES (1, N'PHP-SQL', NULL)
INSERT [dbo].[M_Plateform] ([Sr_no], [Plateform], [isdelete]) VALUES (2, N'Excel', NULL)
INSERT [dbo].[M_Plateform] ([Sr_no], [Plateform], [isdelete]) VALUES (3, N'PHP-MySQL', NULL)
INSERT [dbo].[M_Plateform] ([Sr_no], [Plateform], [isdelete]) VALUES (4, N'PLC', NULL)
INSERT [dbo].[M_Plateform] ([Sr_no], [Plateform], [isdelete]) VALUES (5, N'Production', NULL)
INSERT [dbo].[M_Plateform] ([Sr_no], [Plateform], [isdelete]) VALUES (6, N'Other', NULL)
SET IDENTITY_INSERT [dbo].[M_Plateform] OFF
SET IDENTITY_INSERT [dbo].[M_Status] ON 

INSERT [dbo].[M_Status] ([Sr_no], [Status], [isdelete]) VALUES (1, N'Completed', NULL)
INSERT [dbo].[M_Status] ([Sr_no], [Status], [isdelete]) VALUES (2, N'Running', NULL)
INSERT [dbo].[M_Status] ([Sr_no], [Status], [isdelete]) VALUES (3, N'Not Start', NULL)
INSERT [dbo].[M_Status] ([Sr_no], [Status], [isdelete]) VALUES (4, N'HOLD', NULL)
SET IDENTITY_INSERT [dbo].[M_Status] OFF
ALTER TABLE [dbo].[Data] ADD  CONSTRAINT [DF_Data_Create_Date]  DEFAULT (getdate()) FOR [Create_Date]
GO
USE [master]
GO
ALTER DATABASE [IT_Software] SET  READ_WRITE 
GO
