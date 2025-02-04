import Button from "./components/Button" ;
import Modal from "./components/Modal";
import {useState} from "react"

function App(){
  const [show, setShow] = useState(false);

  return <div>
      <Button setShow={setShow}/>
      <Modal  show={show}  setShow={setShow}/>
  </div>
}

export default App ;