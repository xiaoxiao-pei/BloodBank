drop database bloodBank;
create database bloodBank;

use bloodBank;

create table admin(
	Username varchar(20) not null,
    Password varchar(50) not null,
    FirstName varchar(50) not null,
    LastName varchar(50) not null,
    constraint pk_Admin primary key (Username asc)
);

create table donor(
	DonorID int not null auto_increment,
    Username varchar(20) not null,
    Password varchar(50) not null,
	FirstName varchar(50) not null,
    LastName varchar(50) not null,
    BloodType varchar(10) not null,
    PhoneNumber varchar(15) not null,
    Email varchar(20) not null,
    address varchar(50)  null,
    postcode varchar(10)  null,
    Notes text null,
    constraint pk_Donor primary key (DonorID asc)
)
;

create table patient
(
	PatientID int not null auto_increment,
	FirstName varchar(50) not null,
    LastName varchar(50) not null,
    BloodType varchar(10) not null,
    Notes text null,
    DoctorID int not null,
    constraint pk_Patient primary key (PatientID asc)
)
;


create table doctor
(
	DoctorId int not null,
    Password varchar(50) not null,
	FirstName varchar(50) not null,
    LastName varchar(50) not null,
    Role varchar(50) not null,
    constraint pk_doctor primary key (DoctorId asc)
)
;

create table donations
(
    DonationID varchar(11) not null,
    DonorID int not null,
    BloodAmount int not null,
    DonateDate date not null,
    constraint pk_bloodStock primary key(DonationID)
);

create table blood
(
	BloodType varchar(10) not null,
    BloodVolume int not null,
    constraint pk_blood primary key(BloodType)
);
