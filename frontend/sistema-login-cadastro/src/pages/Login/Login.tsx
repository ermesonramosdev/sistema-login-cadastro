import { Form } from "../../components/Form/Form";
import { LinkForm } from "../../components/LinkForm/LinkForm";

export const Login: React.FC = () => {
    return(
        <div className="container">
            <h1 style={{ textAlign: "center" }}>Login</h1>
                <Form 
                    form={[
                        { label: "Email", type: "text", name: "Login" },
                        { label: "Senha", type: "password", name: "Login" }
                        
                    ]}
                />
                <LinkForm text="Já se cadastrou" to="/cadastro" />
         </div>
        
    );
}