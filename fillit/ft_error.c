/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_error.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/13 17:44:14 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/13 18:03:33 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "include/fillit.h"

void	ft_error(int fd)
{
	if (fd == 1)
		puts("open failed");
	if (fd == 2)
		puts("read failed");
	if (fd == 3)
		puts("close failed");
	exit(0);
}