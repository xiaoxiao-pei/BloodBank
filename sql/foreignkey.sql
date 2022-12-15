use bloodBank;

ALTER TABLE patient
ADD CONSTRAINT FK_DoctorPatient
FOREIGN KEY (DoctorID) REFERENCES doctor(DoctorID);

ALTER TABLE patient
ADD CONSTRAINT FK_BloodPatient
FOREIGN KEY (BloodType) REFERENCES blood(BloodType);

ALTER TABLE donor
ADD CONSTRAINT FK_BloodDonor
FOREIGN KEY (BloodType) REFERENCES blood(BloodType);

ALTER TABLE donations
ADD CONSTRAINT FK_DonerDonations
FOREIGN KEY (DonorID) REFERENCES donor(DonorID);