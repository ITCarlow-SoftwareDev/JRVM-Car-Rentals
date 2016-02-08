#JRVM Car Rentals
###Database design
---
#####Company table
| Field                | Type        | Null | Key | Default | Comments |
|----------------------|-------------|------|-----|---------|----------|
| CompanyID            | int(11)     | NO   | PRI | NULL    | Primary key |
| CompanyName          | varchar(35) | NO   |     | NULL    | Stores name of company |
| Street               | varchar(35) | NO   |     | NULL    |       |
| Town                 | varchar(20) | NO   |     | NULL    |       |
| County               | varchar(20) | NO   |     | NULL    |       |
| PhoneNo              | int(11)     | NO   |     | NULL    |       |
| CreditLimit          | int(11)     | NO   |     | NULL    |       |
| CumulativeRentals    | int(11)     | NO   |     | NULL    |       |
| CurrentBalance       | float       | NO   |     | NULL    |       |
| CumulativeBlacklists | int(11)     | NO   |     | NULL    |       |
| DeleteFlag           | tinyint(1)  | NO   |     | NULL    |       |

#####Blacklist table
| Field          | Type         | Null | Key | Default | Comments |
|----------------|--------------|------|-----|---------|-------|
| BlacklistID    | int(11)      | NO   | PRI | NULL    |       |
| EmployeeID     | int(11)      | NO   |     | NULL    |       |
| CompanyID      | varchar(20)  | NO   |     | NULL    |       |
| StartBlacklist | date         | NO   |     | NULL    |       |
| FinishDate     | date         | NO   |     | NULL    |       |
| AmountOnStart  | float        | NO   |     | NULL    |       |
| Description    | varchar(500) | NO   |     | NULL    |       |
| DeleteFlag     | tinyint(1)   | NO   |     | NULL    |       |



#####Cars table
| Field             | Type         | Null | Key | Default | Comments |
|-------------------|--------------|------|-----|---------|-------|
| RegNo             | varchar(11)  | NO   | PRI | NULL    |       |
| CategoryID        | varchar(20)  | NO   |     | NULL    |       |
| Model             | varchar(20)  | NO   |     | NULL    |       |
| Colour            | varchar(20)  | NO   |     | NULL    |       |
| ChassisNo         | int(11)      | YES  |     | NULL    |       |
| BodyStyle         | varchar(20)  | YES  |     | NULL    |       |
| Doors             | int(5)       | NO   |     | NULL    |       |
| DateAdded         | date         | NO   |     | NULL    |       |
| Manufacturer      | varchar(20)  | NO   |     | NULL    |       |
| Status            | tinyint(1)   | NO   |     | NULL    |       |
| CumulativeRentals | int(11)      | YES  |     | NULL    |       |
| EngineSize        | float        | NO   |     | NULL    |       |
| Version           | varchar(10)  | NO   |     | NULL    |       |
| FuelType          | varchar(100) | YES  |     | NULL    |       |
| DeleteFlag        | tinyint(1)   | NO   |     | NULL    |       |


#####Rental table
| Field            | Type        | Null | Key | Default | Comments |
|------------------|-------------|------|-----|---------|-------|
| RentalID         | int(11)     | NO   | PRI | NULL    |       |
| RegNo            | varchar(12) | NO   |     | NULL    |       |
| CompanyID        | int(11)     | NO   |     | NULL    |       |
| PaymentID        | int(11)     | NO   |     | NULL    |       |
| EmployeeID       | int(11)     | NO   |     | NULL    |       |
| RentalDate       | date        | NO   |     | NULL    |       |
| ReturnDate       | date        | NO   |     | NULL    |       |
| ActualReturnDate | date        | NO   |     | NULL    |       |
| DeleteFlag       | tinyint(1)  | NO   |     | NULL    |       |


#####Category table
| Field           | Type        | Null | Key | Default | Comments |
|-----------------|-------------|------|-----|---------|-------|
| CategoryID      | varchar(1)  | NO   | PRI |         |       |
| RegNo           | varchar(11) | NO   | UNI | NULL    |       |
| Price           | float       | YES  |     | NULL    |       |
| FiveDayDiscount | float       | YES  |     | NULL    |       |
| TenDayDiscount  | float       | YES  |     | NULL    |       |
| DeleteFlag      | int(4)      | NO   |     | NULL    |       |

#####Payment table
| Field         | Type        | Null | Key | Default | Comments |
|---------------|-------------|------|-----|---------|-------|
| PaymentID     | int(11)     | NO   | PRI | NULL    |       |
| RentalID      | int(11)     | NO   |     | NULL    |       |
| CompanyID     | varchar(20) | NO   |     | NULL    |       |
| PaymentMethod | varchar(15) | NO   |     | NULL    |       |
| NameOnCard    | varchar(35) | NO   |     | NULL    |       |
| CardAddress   | varchar(35) | NO   |     | NULL    |       |
| CardNumber    | int(20)     | NO   |     | NULL    |       |
| CVV           | int(11)     | NO   |     | NULL    |       |
| ExpiryDate    | date        | NO   |     | NULL    |       |
| AmountPaid    | float       | NO   |     | NULL    |       |
| DeleteFlag    | tinyint(1)  | NO   |     | NULL    |       |

#####Penalty table
| Field       | Type       | Null | Key | Default | Comments |
|-------------|------------|------|-----|---------|-------|
| PenaltyID   | int(11)    | NO   | PRI | NULL    |       |
| RentalID    | int(11)    | NO   |     | NULL    |       |
| LateReturn  | float      | NO   |     | NULL    |       |
| CarDamage   | float      | NO   |     | NULL    |       |
| LatePayment | float      | NO   |     | NULL    |       |
| DeleteFlag  | tinyint(1) | NO   |     | NULL    |       |

#####Employee table
| Field      | Type         | Null | Key | Default | Comments |
|------------|--------------|------|-----|---------|-------|
| EmployeeID | int(11)      | NO   | PRI | NULL    |       |
| UserName   | varchar(20)  | NO   | UNI | NULL    |       |
| Password   | varchar(30)  | NO   |     | NULL    |       |
| Email      | varchar(50)  | YES  | UNI | NULL    |       |
| Address    | varchar(100) | YES  |     | NULL    |       |
| PPS        | varchar(11)  | NO   | UNI | NULL    |       |
| Phone      | int(11)      | YES  |     | NULL    |       |
| DeleteFlag | tinyint(4)   | NO   |     | NULL    |       |
