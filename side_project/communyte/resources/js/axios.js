import axios from "axios";

// 서버와 통신하는 처리
const axiosInstance = axios.create({
    headers: {
        'Content-Type': 'application/json',
    }
});

export default axiosInstance;