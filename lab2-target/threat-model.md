# Threat model:
1. Asset
**A1 — User credentials**: username, password/hash
**A2 — User identity/session**: session cookie, user_id cookie
**A3 — User-generated comments**: comments, username associated with comment, timestamp
**A4 — Application/database integrity**: database.db, users table, comments table
**A5 — Application availability/confidentiality**: database hoặc application behavior bị thao túng.

2. Threat actor
**T1 — Unauthenticated remote/local user**: Người chưa đăng nhập nhưng có thể tương tác với các route public.
**T2 — Registered low-privilege user**: Một user bình thường cố truy cập hoặc tác động đến dữ liệu ngoài quyền của mình.
**T3 — Malicious user**: Người cố ý gửi input đặc biệt tới authentication/database/comment functionality.

3. Attack	surface:	kẻ	tấn	công	có	thể	tương	tác	với	hệ	thống	qua	5 route đã đề cập ở bảng
4. Trust Boundary
User-controlled HTTP input → Flask backend → SQLite database.

Các mối đe dọa ở ứng dụng Web này:
| ID  | Threat                     | Qua                            | Asset            | Hậu quả                                |
| --- | -------------------------- | ---------------------------------- | ---------------- | -------------------------------------- |
| T01 | SQL Injection              | `/login`, `/register`, `/comments` | DB/auth          | Bypass hoặc thao tác DB                |
| T02 | Stored XSS                 | `/comments`                        | User/browser     | Script chạy trong browser              |
| T03 | Weak password hashing      | `/register`                        | Password         | Hash dễ bị crack                       |
| T04 | Hard-coded secret          | `app.py`                           | Session/security | Secret bị lộ                           |
| T05 | Client-controlled identity | `session` cookie                   | User identity    | Giả mạo username                       |
| T06 | Missing authentication     | `/comments`                        | Comment data     | Người chưa xác thực có thể gửi dữ liệu |