use bloodbank;
insert into 
	admin(Username,Password,FirstName,LastName)
values
	('Admin1', MD5('Admin1'),'anna', 'smith'),
    ('Admin2', MD5('Admin2'),'bill', 'smith'),
    ('Admin3', MD5('Admin3'), 'charles', 'smith');
    
insert into
	blood(BloodType,BloodVolume)
values
	('A', '0'),
    ('A+', '0'),
    ('B', '2000'),
    ('B+', '0'),
    ('O', '0'),
    ('O+', '2500'),
    ('AB', '0'),
    ('AB+', '0');
    

insert into
	donor(DonorID, Username, Password, FirstName, LastName, BloodType, PhoneNumber, Email, Notes)
values
	('100001', 'donor1', MD5('Donor1@'), 'Charlize', 'Farley', 'A', '5141231234', 'donor1@gmail.com', ''),
    ('100002', 'donor2', MD5('Donor2@'), 'Denise', 'Hatfield', 'A', '5141231235', 'donor2@gmail.com', ''),
    ('100003', 'donor3', MD5('Donor3@'), 'Tripp', 'Mcneil', 'A+', '5141231236', 'donor3@gmail.com', ''),
    ('100004', 'donor4', MD5('Donor4@'), 'Junior', 'Lara', 'A+', '5141231237', 'donor4@gmail.com', ''),
    ('100005', 'donor5', MD5('Donor5@'), 'Cristopher', 'Valencia', 'B', '5141231238', 'donor5@gmail.com', ''),
    ('100006', 'donor6', MD5('Donor6@'), 'Cameron', 'Kent', 'B', '5141231239', 'donor6@gmail.com', ''),
    ('100007', 'donor7', MD5('Donor7@'), 'Lilah', 'Beasley', 'B+', '5141231210', 'donor7@gmail.com', 'Pregnant since June 05, 2022'),
    ('100008', 'donor8', MD5('Donor8@'), 'Trevin', 'Bullock', 'B+', '5141231211', 'donor8@gmail.com', ''),
    ('100009', 'donor9', MD5('Donor9@'), 'Grace', 'Banks', 'O', '5141231212', 'donor9@gmail.com', ''),
    ('100010', 'donor10', MD5('Donor10@'), 'Cherish', 'Orozco', 'O', '5141231213', 'donor10@gmail.com', 'Dental Implantation on Augest 20, 2022'),
    ('100011', 'donor11', MD5('Donor11@'), 'London', 'Scott', 'O+', '5141231214', 'donor11@gmail.com', ''),
    ('100012', 'donor12', MD5('Donor12@'), 'Davian', 'Hinton', 'O+', '5141231215', 'donor12@gmail.com', ''),
    ('100013', 'donor13',  MD5('Donor13@'), 'Yoselin', 'Webster', 'AB', '5141231216', 'donor13@gmail.com', ''),
    ('100014', 'donor14',  MD5('Donor14@'), 'Emanuel', 'Ramsey', 'AB', '5141231217', 'donor14@gmail.com', ''),
    ('100015', 'donor15',  MD5('Donor15@'), 'Corey', 'Cantu', 'AB+', '5141231218', 'donor15@gmail.com', ''),
    ('100016', 'donor16',  MD5('Donor16@'), 'Alexis', 'Ruiz', 'AB+', '5141231219', 'donor16@gmail.com', '');



insert into
	doctor(DoctorId, Password, FirstName, LastName, Role)
values
	('5001',  MD5('Doctor1@'), 'Colin', 'Jacobson', 'Cardiology'),
    ('5002',  MD5('Doctor2@'), 'Kathleen', 'Weiss', 'Gastroenterology'),
    ('5003',  MD5('Doctor3@'), 'Danika', 'Tucker', 'Cardiology'),
    ('5004',  MD5('Doctor4@'), 'Aydin', 'Peterson', 'Emergency medicine'),
    ('5005',  MD5('Doctor5@'), 'Azaria', 'Armstrong', 'Emergency medicine');

 

insert into
	donations(DonationID, DonorID, BloodAmount, DonateDate)
values
	('20220506123', '100010', '500', '2022-05-06'),
    ('20220925025',  '100010', '500', '2022-09-25'),
	('20220716123',  '100009', '500', '2022-07-16'), 
    ('20220322006',  '100009', '500', '2022-03-22'), 
    ('20220916012',  '100009', '500', '2022-09-16'), 
    ('20220716018',  '100005', '500', '2022-07-16'), 
	('20220626010',  '100005', '500', '2022-06-26'), 
	('20220925018',  '100006', '500', '2022-09-25'),
	('20220519036',  '100006', '500', '2022-05-19');
    
insert into 
	patient( PatientID, FirstName, LastName, BloodType, Notes, DoctorID)
values
	('20001', 'Dakota', 'Dalton', 'O', 'emergency', '5001'),
    ('20002', 'Zaiden', 'Colon', 'B', 'diabetes', '5001'),
    ('20003', 'Rylee', 'Brandt', 'O', 'cardiac surgery', '5001'),
    ('20004', 'Joseph', 'Walter', 'B', 'high blood pressure', '5004'),
    ('20005', 'Aliya', 'Cain', 'O', 'emergency', '5004');
    

	
	
 
 
 
 
 
