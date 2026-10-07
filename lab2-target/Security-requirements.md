# Security requirements:
| ID   | Security Requirement                                                     |
| ---- | ------------------------------------------------------------------------ |
| SR01 | Mọi SQL query phải sử dụng parameterized queries                         |
| SR02 | Password phải được hash bằng password hashing algorithm phù hợp, có salt |
| SR03 | Application secret không được hard-code trong source                     |
| SR04 | Identity/session phải được server kiểm soát và bảo vệ                    |
| SR05 | User input khi render HTML phải được output-encode                       |
| SR06 | Các chức năng yêu cầu đăng nhập phải enforce authentication server-side  |