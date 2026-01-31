## O'rnatish bo'yicha qo'llanma
Quyidagilarni linux terminalida ketma-ketlikda ishga tushiring:
```bash
git clone https://github.com/TurgunboyevUz/devpev-docker.git

cd devpev-docker

docker compose up -d
```
Ko'rish uchun havola:
```
https://localhost:8080
```

## 🐳 Docker Bo'yicha Foydali Manbalar

Quyida Docker texnologiyasini o'rganish, sozlash va xavfsizligini tekshirish uchun saralangan manbalar keltirilgan.

### 📘 Rasmiy Hujjatlar (Documentation)

Bu yerda Docker fayllari sintaksisi va sozlamalari bo'yicha eng aniq ma'lumotlarni topishingiz mumkin.

* **Dockerfile:** [Dockerfile Reference](https://docs.docker.com/reference/dockerfile/) – Image yig'ish bo'yicha to'liq qo'llanma.
* **docker-compose.yml:** [Compose File Reference](https://docs.docker.com/reference/compose-file/) – Ko'p konteynerli ilovalarni sozlash bo'yicha qo'llanma.

### 📦 Repozitoriy

* **Docker Hub:** [hub.docker.com](https://hub.docker.com/) – Tayyor Docker imagelarini izlash va saqlash uchun asosiy manba.

---

### 🔓 Docker Escaping (Xavfsizlik va Hujum)

Konteyner izolatsiyasidan chiqib ketish (escape) va xavfsizlik zaifliklarini o'rganish uchun manbalar:

1. **Exploit Notes:** [Docker Container Breakout & Privilege Escalation](https://exploit-notes.hdks.org/exploit/container/docker/docker-escape/) – Texnik buyruqlar va ekspluatatsiya usullari to'plami.
2. **Habr Maqolasi:** [Docker konteyneridan qochish (Escaping)](https://habr.com/ru/companies/first/articles/650553/) – Rus tilidagi batafsil tushuntirish va amaliy misollar.
3. **Wizard Cyber:** [Attacker's Perspective](https://wizardcyber.com/escaping-docker-container-an-attackers-perspective/) – Hujumchi ko'zi bilan Docker xavfsizligiga nazar.