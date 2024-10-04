import axios from 'axios'

const api = axios.create({
    baseURL: '/api',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json',
    },
    withCredentials: true
})

// // リクエストインターセプター
// api.interceptors.request.use(
//     (config) => {
//         const token = localStorage.getItem('auth_token')
//         if (token) {
//             config.headers['Authorization'] = `Bearer ${token}`
//         }
//         return config
//     },
//     (error) => {
//         return Promise.reject(error)
//     }
// )

// // レスポンスインターセプター
// api.interceptors.response.use(
//     (response) => response,
//     async (error) => {
//         if (error.response.status === 401) {
//             // トークンの再取得やリフレッシュのロジックをここに実装
//             // 例: await refreshToken()
//             // リフレッシュ後に元のリクエストを再試行
//             // return api(error.config)
//         }
//         return Promise.reject(error)
//     }
// )

export default api