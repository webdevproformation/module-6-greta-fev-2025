function Modal({ show , setShow} )
{

    return (
        <div>
            { show ? <section id="modal" onClick={() => setShow(function(show) {
                return !show 
            })}>
                <span className="close" >&times;</span>
                <img className="modal-content" src="mario.jpg" alt="" />
                <div id="caption">super mario</div>
            </section> : "rien" }
        </div>
    )
}

export default Modal ; 