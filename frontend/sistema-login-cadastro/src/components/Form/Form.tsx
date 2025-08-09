import "./Form.css";
type FieldForm = {
    label: string;
    type: string
}

type LoginProps = {
    form: FieldForm[];
}

export const Form: React.FC<LoginProps> = ({ form }) => {

    return(
        <form className="form-catalog">
            {form.map((field, index) => (
                <div key={index} className="container-form-catalog">
                    <label htmlFor={field.label}>{field.label}</label>
                    <input 
                        id={field.label}
                        type={field.type}
                        name={field.label} 
                    />
                </div>
            ))}
            <button type="submit">Cadastrar</button>
        </form>
    );
}