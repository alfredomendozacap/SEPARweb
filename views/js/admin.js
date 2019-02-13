;
((d,w,c)=>{
    d.addEventListener('submit',e => {
        if (e.target.matches('form')) {
            e.preventDefault()
            alert('registrando..')
            let data = new FormData(e.target)
            for (let key of data.keys()) {
                c(key)
            }
            for (let value of data.values()) {
                c(value)
            } 

            fetch('./views/admin/login.php',{
                body: data,
                method: 'post'
            })
                .then(res=>{
                    return (res.ok)
                        ? res.json()
                        : Promise.reject({ status: res.status, statusText: res.statusText })
                })
                .then(res=>{
                    c(res)
                })
        }
    })
})(document,window,console.log)