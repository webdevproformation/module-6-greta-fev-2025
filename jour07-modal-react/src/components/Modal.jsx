function Modal({toggle, show} )
{

    return <section id="modal" className={show ? "" : "d-none"} onClick={toggle}>
        <span className="close" >&times;</span>
        <img className="modal-content" src="mario.jpg" alt="" />
        <div id="caption">super mario</div>
    </section>
}

export default Modal ; 