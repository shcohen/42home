# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: shcohen <marvin@42.fr>                     +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2018/05/15 15:15:10 by shcohen           #+#    #+#              #
#    Updated: 2018/05/16 22:58:05 by shcohen          ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME = libft.a
CC = gcc
FLAGS = -Wall -Werror -Wextra
SRC = ft_memset.c \
	  ft_bzero.c \
	  ft_memcpy.c \
	  ft_memccpy.c \
	  ft_memmove.c
SRCO = ${SRC:.c=.o}

all : $(NAME)

$(NAME) :
		$(CC) $(FLAGS) -c $(SRC)
		ar rc $(NAME) $(SRCO)
		ranlib $(NAME)

clean :
	rm -rf $(SRCO)

fclean : clean
	rm -rf $(NAME)

re : fclean all

.PHONY : all clean fclean re
