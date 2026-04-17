async function apiFetch(url, options = {}) {
    const token = localStorage.getItem('token');

    const defaultHeaders = {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    };

    if(token && !url.includes('/login') && !url.includes('/register')){
        defaultHeaders['Authorization'] = 'Bearer ' + token;
    }

    const res = await fetch(url, {
        ...options,
        headers: {
            ...defaultHeaders,
            ...(options.headers || {})
        }
    });

    let data;
    try {
        data = await res.json();
    } catch (e) {
        data = { message: 'Response bukan JSON' };
    }

    if(res.status === 401){
        localStorage.removeItem('token');
        window.location.href = '/login';
    }

    return { res, data };
}