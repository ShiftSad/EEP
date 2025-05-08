#include <stdio.h>
#include <string.h>

int main() {
    int correctPassword = 123456; 
    int enteredPassword;
    int maximumAllowedAttempts = 3;
    int accessGrantedFlag = 0; 

    printf("Digite a senha numerica de 6 digitos.\n");

    for (int attemptCounter = 1; attemptCounter <= maximumAllowedAttempts; attemptCounter++) {
        printf("Tentativa %d de %d: ", attemptCounter, maximumAllowedAttempts);
        scanf("%d", &enteredPassword);

        if (enteredPassword == correctPassword) {
            printf("acesso permitido\n");
            accessGrantedFlag = 1;
            break; 
        } 
        else if (attemptCounter < maximumAllowedAttempts) printf("Senha incorreta. Tente novamente.\n");
    }

    if (accessGrantedFlag == 0) printf("acesso negado\n");
}
