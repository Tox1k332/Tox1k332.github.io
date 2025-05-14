document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('loginModal');
    const btn = document.getElementById('loginBtn');
    const span = document.getElementsByClassName('close')[0];

    checkAuthStatus();

    btn.onclick = function() {
        if (btn.textContent === 'Профиль') {
            window.location.href = '/profile.php'; 
        } else {
            modal.style.display = 'block';
        }
    }

    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.onsubmit = async function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            try {
                const response = await fetch('/auth/login_handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
                });
                
                const data = await response.json();
                
                if (data.success) {
                    modal.style.display = 'none';
                    btn.textContent = 'Профиль';
                    window.location.reload();
                } else {
                    alert(data.message || 'Ошибка авторизации');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Ошибка соединения с сервером');
            }
        };
    }

    const burger = document.getElementById('burger');
    const mobileMenu = document.getElementById('mobileMenu');

    if (burger && mobileMenu) {
        burger.addEventListener('click', function() {
            this.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            
            const spans = this.querySelectorAll('span');
            if (this.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(7.5px, -7.5px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                burger.classList.remove('active');
                const spans = burger.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });
    }
});

async function checkAuthStatus() {
    try {
        const response = await fetch('/auth/check_auth.php');
        const data = await response.json();
        
        if (data.authenticated) {
            document.getElementById('loginBtn').textContent = 'Профиль';
        }
    } catch (error) {
        console.error('Auth check error:', error);
    }
}