import axios from "axios";

class HttpClient
{
    constructor()
    {
        this.client = axios.create({
            baseURL: '/cms/api/'
        })
    }

    async get(url) {
        return this.client.get(url)
    }

    async post(url, data)
    {
        return this.client.post(url, data)
    }

    async put(url, data)
    {
        return this.client.put(url, data)
    }

    async delete(url)
    {
        return this.client.delete(url)
    }
}

export default HttpClient
