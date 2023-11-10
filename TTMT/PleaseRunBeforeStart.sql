--please run import this into sql for first time before start the php.

CREATE DATABASE ttmt;

CREATE TABLE ttmt.project_list (
ProjectID int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
ProjectName varchar(100) NOT NULL,
LanguageFrom varchar(50) NOT NULL,
LanguageTo varchar(50) NOT NULL
);
