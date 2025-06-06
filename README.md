# 🚀 ฐานข้อมูล Address และ Users ด้วย Docker Compose

---

คู่มือนี้จะช่วยให้คุณตั้งค่าและรันฐานข้อมูล **MySQL** ที่มีตาราง `address` และ `users` พร้อมข้อมูลตัวอย่างได้อย่างรวดเร็วโดยใช้ **Docker Compose**

### 📦 สิ่งที่คุณต้องมี

ตรวจสอบให้แน่ใจว่าคุณได้ติดตั้งสิ่งเหล่านี้บนเครื่องของคุณ:

- **Docker Desktop** (ซึ่งรวมถึง Docker Engine และ Docker Compose)

---

### 🚀 วิธีเริ่มต้น

1.  **รัน Docker Compose**:
    เปิด **Terminal** หรือ **Command Prompt** ไปยังไดเรกทอรีที่คุณสร้างไฟล์ทั้งสอง และรันคำสั่ง:

    ```bash
    docker-compose up -d --build
    ```

    คำสั่งนี้จะ:

    - ดาวน์โหลดอิมเมจ MySQL 8.0 (หากยังไม่มี)
    - สร้างและรันคอนเทนเนอร์ MySQL ในโหมดเบื้องหลัง (`-d` คือ detached mode)
    - เมาท์วอลุ่ม `./data` เพื่อเก็บข้อมูลฐานข้อมูลอย่างถาวร (ข้อมูลจะไม่หายไปแม้คอนเทนเนอร์จะถูกลบ)
    - เมาท์ไฟล์ `./init.sql` ไปยังตำแหน่งที่ Docker Entrypoint ของ MySQL จะรันสคริปต์ SQL นี้เมื่อคอนเทนเนอร์เริ่มต้น ทำให้มีการสร้างตาราง `address` และ `users` พร้อมข้อมูลตัวอย่างโดยอัตโนมัติ

---

### ✅ ตรวจสอบสถานะ

คุณสามารถตรวจสอบสถานะของคอนเทนเนอร์ได้โดยใช้:

```bash
docker compose ps
```
