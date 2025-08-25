#include <stdio.h>
#include <string.h>

void reverse_string(char *text) {
    char *start = text;                  // pointer to the first char
    char *end = text + strlen(text) - 1; // pointer to the last char

    while (start < end) {
        const char temp = *start;
        *start = *end;
        *end = temp;

        start++;
        end--;
    }
}

int main() {
    char text[] = "Hello, World!";
    reverse_string(text);

    printf("Reversed: %s\n", text);
}
