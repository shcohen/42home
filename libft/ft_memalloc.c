/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_memalloc.c                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/05/25 21:45:28 by shcohen           #+#    #+#             */
/*   Updated: 2018/06/17 17:44:50 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

void	*ft_memalloc(size_t size)
{
	void	*str;

	str = malloc(sizeof(void *) * (size));
	if (!str)
		return (NULL);
	ft_memset(str, 0, size);
	return (str);
}
