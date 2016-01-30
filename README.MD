#JRVM Car Rentals
###Database design
---
#####Users table
| Field    | Type         | Null | Key | Default | Extra          |
|----------|--------------|------|-----|---------|----------------|
| UserID   | int(11)      | NO   | PRI | NULL    | auto_increment |
| Username | varchar(20)  | NO   | UNI | NULL    |                |
| Password | varchar(30)  | NO   |     | NULL    |                |
| Email    | varchar(50)  | YES  | UNI | NULL    |                |
| Address  | varchar(100) | YES  |     | NULL    |                |
| PPS      | varchar(11)  | NO   | UNI | NULL    |                |
| Phone    | int(11)      | YES  |     | NULL    |                |

#####Company table
| Field               | Type        | Null | Key | Default | Extra |
|---------------------|-------------|------|-----|---------|-------|
| CompanyID           | int(11)     | NO   | PRI | NULL    |       |
| CompanyName         | varchar(35) | NO   |     | NULL    |       |
| Street              | varchar(35) | NO   |     | NULL    |       |
| Town                | varchar(20) | NO   |     | NULL    |       |
| County              | varchar(20) | NO   |     | NULL    |       |
| PhoneNo             | int(11)     | NO   |     | NULL    |       |
| CreditLimit         | int(11)     | NO   |     | NULL    |       |
| CumulativeRental    | int(11)     | NO   |     | NULL    |       |
| CurrentBalance      | float       | NO   |     | NULL    |       |
| CumulativeBlacklist | int(11)     | NO   |     | NULL    |       |


#####Cars table
| Field       | Type         | Null | Key | Default | Extra |
|-------------|--------------|------|-----|---------|-------|
| RegNo       | varchar(11)  | NO   | PRI | NULL    |       |
| ModelName   | varchar(20)  | NO   |     | NULL    |       |
| Color       | varchar(20)  | NO   |     | NULL    |       |
| ChassisNo   | int(11)      | YES  |     | NULL    |       |
| BodyStyle   | varchar(20)  | YES  |     | NULL    |       |
| Doors       | int(11)      | NO   |     | NULL    |       |
| DateOfAdded | date         | NO   |     | NULL    |       |
| Manufacture | varchar(20)  | NO   |     | NULL    |       |
| Status      | tinyint(1)   | NO   |     | NULL    |       |
| Cumulative  | int(11)      | YES  |     | NULL    |       |
| EngineSize  | float        | NO   |     | NULL    |       |
| Version     | varchar(10)  | NO   |     | NULL    |       |
| Description | varchar(100) | YES  |     | NULL    |       |

#####Rental table
| Field            | Type    | Null | Key | Default | Extra |
|------------------|---------|------|-----|---------|-------|
| RentalID         | int(11) | NO   | PRI | NULL    |       |
| CustomerID       | int(11) | NO   |     | NULL    |       |
| PaymentID        | int(11) | NO   |     | NULL    |       |
| UserID           | int(11) | NO   |     | NULL    |       |
| RentalDate       | date    | NO   |     | NULL    |       |
| ReturnDate       | date    | NO   |     | NULL    |       |
| ActualReturnDate | date    | NO   |     | NULL    |       |

#####Categories table
| Field            | Type        | Null | Key | Default | Extra |
|------------------|-------------|------|-----|---------|-------|
| RegNo            | varchar(11) | NO   | PRI | NULL    |       |
| Category         | varchar(1)  | YES  |     | NULL    |       |
| Price            | float       | YES  |     | NULL    |       |
| FiveDaysDiscount | float       | YES  |     | NULL    |       |
| TenDaysDiscount  | float       | YES  |     | NULL    |       |

#####Payment table
| Field         | Type        | Null | Key | Default | Extra |
|---------------|-------------|------|-----|---------|-------|
| PaymentID     | int(11)     | NO   |     | NULL    |       |
| RentalID      | int(11)     | NO   |     | NULL    |       |
| PaymentMethod | varchar(15) | NO   |     | NULL    |       |
| NameOnCard    | varchar(35) | NO   |     | NULL    |       |
| CardAddress   | varchar(35) | NO   |     | NULL    |       |
| CardNumber    | int(20)     | NO   |     | NULL    |       |
| CVV           | int(11)     | NO   |     | NULL    |       |
| ExpireDate    | date        | NO   |     | NULL    |       |
| AmountPaid    | float       | NO   |     | NULL    |       |

#####Penalty table
| Field       | Type    | Null | Key | Default | Extra |
|-------------|---------|------|-----|---------|-------|
| PenaltyID   | int(11) | NO   | PRI | NULL    |       |
| RentalID    | int(11) | NO   |     | NULL    |       |
| LateReturn  | float   | NO   |     | NULL    |       |
| CarCrash    | float   | NO   |     | NULL    |       |
| LatePayment | float   | NO   |     | NULL    |       |

#####Blacklist table
| Field          | Type         | Null | Key | Default | Extra |
|----------------|--------------|------|-----|---------|-------|
| BlacklistID    | int(11)      | NO   |     | NULL    |       |
| CustomerID     | int(11)      | NO   |     | NULL    |       |
| UserID         | int(11)      | NO   |     | NULL    |       |
| StartBlacklist | date         | NO   |     | NULL    |       |
| FinishDate     | int(11)      | NO   |     | NULL    |       |
| AmountOnStart  | float        | NO   |     | NULL    |       |
| Description    | varchar(500) | NO   |     | NULL    |       |
| CurrentStatus  | tinyint(1)   | NO   |     | NULL    |       |
