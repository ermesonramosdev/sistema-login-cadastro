import { useState } from "react";
import axios from "axios";
import "./Form.css";

type FieldForm = {
    label: string;
    type: string;
    name: string;
}

type LoginProps = {
    form: FieldForm[];
}

export const Form: React.FC<LoginProps> = ({ form }) => {

    const [formData, setFormData] = useState({
        name: "",
        email: "",
        password: ""
    });
    
    //Pegar os dados do input e inserir dentro do array setFormData
    const handleChange = (event: React.ChangeEvent<HTMLInputElement>) => {
        const { name, value } = event.target;
        
        setFormData((prev) => ({
            ...prev,
            [name]: value,
        }))
    }

    //Captura mudanças nos inputs
    const handleSubmit = async (event: React.FormEvent) => {
        event.preventDefault();

        const isRegister = form.some((field) => field.label == "Nome: ");

        
        if(isRegister) {
            try {
                const response = await axios.post('http://localhost/sistema-login-cadastro/backend/user-register/user-register.php', formData);

                console.log(response.data);

                console.log("Dados que estão sendo enviados: ", formData);
                setFormData({name: "", email: "", password: ""});
                    
            } catch(error) {
                console.error("Não deu para enviar os dados: ", error);
            }
        } else {
            try {
                const response = await axios.post('http://localhost/sistema-login-cadastro/backend/user-validation/user-validation.php', formData);

                console.log(response.data);

                console.log("Dados que estão sendo enviados: ", formData);
                setFormData({name: "", email: "", password: ""});
                    
            } catch(error) {
                console.error("Não deu para enviar os dados: ", error);
            }
        }
    }

    return(
        
        <form className="form-catalog" onSubmit={handleSubmit}>
            {form.map((field, index) => (
                <div key={index} className="container-form-catalog">
                    <label htmlFor={field.label}>{field.label}</label>
                    <input
                        id={field.label}
                        type={field.type}
                        name={field.name}
                        value={formData[field.name as keyof typeof formData]}
                        onChange={handleChange}
                    />
                </div>
            ))}
            <button type="submit">Cadastrar</button>
        </form>
       
    );
}