# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2018/09/20 20:03:35 by shcohen           #+#    #+#              #
#    Updated: 2018/09/20 23:05:49 by shcohen          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME = fillit

SRC = src/main.c \
	src/ft_open_read_close.c \
	src/ft_create_tetris.c \
	src/ft_first_check.c \
	src/ft_check_forme.c

OBJ = $(SRC:.c=.o) 

INC_PATH = include/

all: $(NAME)

$(NAME): $(OBJ)
	@(cd libft; make; cd ..)
	@gcc -Wall -Wextra -Werror $(OBJ) -L libft/ -lft -o $(NAME)

%.o: %.c
	gcc -Wall -Wextra -Werror -c $< -o $@

clean:
	@$(RM) $(OBJ)
	@(cd libft; make clean; cd ..)

fclean: clean
	@(cd libft; make fclean; cd ..)
	@$(RM) $(NAME)

re: fclean all

norme: 
	norminette $(SRC)
	norminette $(INC_PATH)*.h

.PHONY: all clean fclean re